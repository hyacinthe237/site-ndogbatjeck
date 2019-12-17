@servers(['web' => 'ssh_adnand1104@ftp-32.camoo.hosting'])

@setup
    $environment = isset($env) ? $env : "production";
@endsetup

@task('deploy')
    cd /public_html
    
    @if ($branch)
        git pull origin {{ $branch }}
    @endif

    composer install --optimize-autoloader --no-progress
    npm install --save --quiet
    npm cache clean
    npm run production
    npm run production-backend

    php artisan cache:clear
    php artisan config:cache
    php artisan migrate --seed --force
    php artisan module:seed
@endtask
