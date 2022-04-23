@setup

$repo = 'https://github.com/TomasLeonPatlayan/Epicure.git';
$branch = $branch = isset($branch) ? $branch : "main";

date_default_timezone_set('Europe/Berlin');
$deploy_date = date('YmdHis');

$theme_dir = 'web/app/themes';
$appDir = '/var/www/html';
$baseDir = '/home/ubuntu';
$releasesDir = '/home/ubuntu/releases';
$release = 'release_' . $deploy_date;

$newReleaseDir = "{$releasesDir}/{$deploy_date}";
$serve = $appDir . '/current';


$servers = ['local' => '127.0.0.1', 'production' => 'ubuntu@54.87.1.46'];

if( $target === 'production'){
echo 'Deploy to production';
$global_uploads_dir = $shared_drive . 'uploads';
}

if (!isset($branch)){
$branch = 'main';
}

@endsetup

@servers($servers)


@story('deploy')
upload_compiled_assets
@endstory

@task('upload_compiled_assets', ['on' => 'local'])
cd {{ $theme_dir }}
{{--npm run production--}}
tar -czf assets-{{ $release }}.tar.gz dist
scp assets-{{  $release }}.tar.gz {{ $servers[$target] }}:~
rm -rf assets-{{  $release }}.tar.gz


 
@endtask

@task('clone_repo', [ 'on' => $target ])
    [ -d {{ $releasesDir }} ] || sudo mkdir {{ $releasesDir }};
    sudo chmod 777 {{ $releasesDir }}
    cd {{ $releasesDir }};
    echo "Deployment ({{ $deploy_date }}) started";
    git clone --single-branch -b  {{$branch}} {{ $repo }} {{ $release }};
    echo "Repository cloned";
@endtask



@task('install', [ 'on' => $target ])
echo "Install starting..."
    cd {{ $releasesDir }}/{{ $release }};
    cp ~/.env .
    composer install --no-dev;
    echo "Install finished"
@endtask


@task('deployment_cleanup', [ 'on' => $target ])
    echo 'Installing compiled assets...'
    cd ~
    tar -xzf assets-{{ $release }}.tar.gz -C {{ $release_dir }}/{{ $release }}{{ $theme_dir }}
    sudo rm -r assets-{{ $release }}.tar.gz

    echo 'Setting permissions...'

    cd {{ $releasesDir }};
    sudo chmod -R ug+rwx {{ $release }};
    sudo chgrp -R www-data {{ $release }};

    echo 'Updating symlinks...'
    sudo ln -n -f -s {{ $releasesDir }}/{{ $release }}/* /var/www/html

    echo 'Deployment to {{$target}} finished successfully.'
@endtask