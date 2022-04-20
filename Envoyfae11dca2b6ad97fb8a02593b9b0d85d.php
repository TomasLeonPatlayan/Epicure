<?php $servers = isset($servers) ? $servers : null; ?>
<?php $message = isset($message) ? $message : null; ?>
<?php $theme_dir = isset($theme_dir) ? $theme_dir : null; ?>
<?php $currentDir = isset($currentDir) ? $currentDir : null; ?>
<?php $deploymentDir = isset($deploymentDir) ? $deploymentDir : null; ?>
<?php $releaseDir = isset($releaseDir) ? $releaseDir : null; ?>
<?php $baseDir = isset($baseDir) ? $baseDir : null; ?>
<?php $release = isset($release) ? $release : null; ?>
<?php $branch = isset($branch) ? $branch : null; ?>
<?php $appDir = isset($appDir) ? $appDir : null; ?>
<?php $repo = isset($repo) ? $repo : null; ?>
<?php $e = isset($e) ? $e : null; ?>
<?php $dotenv = isset($dotenv) ? $dotenv : null; ?>
<?php

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

$theme_dir = 'web/app/themes/';

function logMessage($message) {
return "echo '\033[32m" .$message. "\033[0m';\n";
}
?>


$servers = ['local' => '127.0.0.1','production' => env('DEPLOY_USER').'@'.env('DEPLOY_SERVER')];
<?php $__container->servers($servers); ?>

<?php $__container->startTask('dir',['on' => 'production']); ?>
<?php echo logMessage("Preparing new deployment directory..."); ?>


cd <?php echo $releaseDir; ?>

mkdir <?php echo $release; ?>


<?php echo logMessage(" Preparing new deployment directory complete."); ?>

<?php $__container->endTask(); ?>


<?php $__container->startTask('git',['on' => 'production']); ?>
<?php echo logMessage("Cloning repository"); ?>


cd <?php echo $deploymentDir; ?>

git clone --depth 1 -b <?php echo $branch; ?> "<?php echo $repo; ?>" <?php echo $deploymentDir; ?>


<?php echo logMessage( "Cloning repository complete."); ?>

<?php $__container->endTask(); ?>

<?php $__container->startTask('install',['on' => 'production']); ?>
<?php echo logMessage("Installing dependencies..."); ?>


composer install --no-interaction --quiet --no-dev --prefer-dist --optimize-autoloader
<?php echo logMessage("Installing dependencies complete."); ?>

<?php $__container->endTask(); ?>



<?php $__container->startTask('live',['on' => 'production']); ?>
<?php echo logMessage("Creating symlinks for the live version..."); ?>

ln -nfs <?php echo $appDir; ?>/.env <?php echo $deploymentDir; ?>/.env

cd <?php echo $deploymentDir; ?>

sudo ln -nfs <?php echo $deploymentDir; ?> <?php echo $currentDir; ?>


 
<?php echo logMessage("Creating symlinks completed."); ?>

<?php $__container->endTask(); ?>

<?php $__container->startTask('deployment_cleanup' ,['on' => 'production']); ?>

<?php echo logMessage("Cleaning up old deployments..."); ?>


cd <?php echo $releaseDir; ?>

ls -t | tail -n +4 | xargs rm -rf


<?php echo logMessage("Cleaned up old deployments."); ?>

<?php $__container->endTask(); ?>

<?php $__container->startTask('upload', ['on' => 'local']); ?>
echo <?php echo $theme_dir; ?>

 
<?php $__container->endTask(); ?>
 
<?php $__container->startMacro('deploy-local', ['on' => 'production']); ?>
dir
<?php $__container->endMacro(); ?>

<?php $__container->startMacro('deploy'); ?>
dir
git
install
live
deployment_cleanup

<?php $__container->endMacro(); ?>




<?php $_vars = get_defined_vars(); $__container->finished(function($exitCode = null) use ($_vars) { extract($_vars); 
echo "Envoy deployment complete.\r\n";
}); ?>