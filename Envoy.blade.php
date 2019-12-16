@servers(['web' => 'ssh_adnand1104@ftp-32.camoo.hosting'])

@task('deploy')
    cd /home/public_html
    git pull origin dev
    
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
