p@setup

require __DIR__.'/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
try {
$dotenv->load();
$dotenv->required(['DEPLOY_USER', 'DEPLOY_SERVER', 'DEPLOY_BASE_DIR', 'DEPLOY_REPO','DEPLOY_APP_DIR'])->notEmpty();
} catch ( Exception $e ) {
echo $e->getMessage();
}



// the repository to clone
$repo = env('DEPLOY_REPO');
if (!isset($appDir)) {
// the application directory on your server
$appDir = env('DEPLOY_APP_DIR');
}


// the branch to clone
$branch = 'main';
if (!isset($branch)) {
throw new Exception('--branch must be specified');
}


// set up timezones
date_default_timezone_set('Europe/Berlin');

// we want the releases to be timestamps to ensure uniqueness
$release = date('YmdHis');

$baseDir = env('DEPLOY_BASE_DIR');

// this is where the releases will be stored
$releaseDir = $baseDir . '/releases';

// this is where the deployment will be
$deploymentDir = $releaseDir . '/' . $release;

// and this is the document root directory
$currentDir = $appDir . '/current';




$theme_dir = 'web/app/themes';

function logMessage($message) {
return "echo '\033[32m" .$message. "\033[0m';\n";
}

$servers = ['local' => '127.0.0.1','production' => env('DEPLOY_USER').'@'.env('DEPLOY_SERVER')];
@endsetup



@servers($servers)

@task('dir',['on' => 'production'])
{{ logMessage("Preparing new deployment directory...") }}

cd {{ $releaseDir }}
mkdir {{ $release }}

{{ logMessage(" Preparing new deployment directory complete.") }}
@endtask


@task('git',['on' => 'production'])
{{ logMessage("Cloning repository") }}
sudo chmod 777 {{$deploymentDir}}
cd {{ $deploymentDir }}
git clone --depth 1 -b {{ $branch }} "{{ $repo }}" {{ $deploymentDir }}

{{ logMessage( "Cloning repository complete.") }}


@endtask

@task('upload_compiled_assets', ['on' => 'local'])
cd {{ $theme_dir }}
{{--npm run production--}}
tar -czf assets-{{ $release }}.tar.gz dist
scp assets-{{  $release }}.tar.gz {{ $servers['production'] }}:~
#rm -rf assets-{{  $release }}.tar.gz

#wp plugin list --format=json > ./plugins-export.json
#scp ./plugins-export.json {{ $servers['production'] }}:~
#rm ./plugins-export.json
@endtask

@task('install',['on' => 'production'])
{{ logMessage("Installing dependencies...") }}

composer install --no-interaction --quiet --no-dev --prefer-dist --optimize-autoloader
{{ logMessage("Installing dependencies complete.") }}
@endtask



@task('live',['on' => 'production'])
{{ logMessage("Creating symlinks for the live version...") }}
ln -nfs {{ $appDir }}/.env {{$deploymentDir}}/.env

cd {{ $deploymentDir }}
sudo ln -nfs {{ $deploymentDir }} {{ $currentDir }}

 
{{ logMessage("Creating symlinks completed.") }}
@endtask

@task('deployment_cleanup' ,['on' => 'production'])

{{ logMessage("Cleaning up old deployments...") }}

cd {{ $releaseDir }}
sudo ls -t | tail -n +4 | xargs rm -rf
 
{{ logMessage("Cleaned up old deployments.") }}
@endtask

@task('upload', ['on' => 'production'])

cd {{$currentDir}}/{{$theme_dir}}
sudo rm -r plugins
sudo rm -r uploads
sudo  unzip plugins.zip   


sudo  unzip uploads.zip   
  
@endtask

@task('zip_uploads_plugins', ['on' => 'local'])
cd {{$theme_dir}}
 
zip -r plugins.zip plugins 

zip -r uploads.zip uploads 
@endtask
 
@story('deploy-local', ['on' => 'production'])
dir
@endstory

@story('deploy')

dir
git
 
@endstory




@finished
echo "Envoy deployment complete.\r\n";
@endfinished