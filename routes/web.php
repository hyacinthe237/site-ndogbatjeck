<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Views\Frontend\HomeController@landing');
Route::get('/accueil', 'Views\Frontend\HomeController@home');
Route::get('/bienvenue', 'Views\Frontend\HomeController@bienvenue')->name('bienvenue');
Route::get('/presentation', 'Views\Frontend\HomeController@presentation')->name('presentation');
Route::get('/bureau', 'Views\Frontend\HomeController@bureau')->name('bureau');
Route::get('/organisation', 'Views\Frontend\HomeController@organisation')->name('organisation');
Route::get('/statuts-reglement', 'Views\Frontend\HomeController@statuts')->name('statuts');
Route::get('/devenir-membre', 'Views\Frontend\HomeController@membre')->name('devenir-membre');
Route::get('/albums', 'Views\Frontend\HomeController@albums')->name('albums');
Route::get('/videos', 'Views\Frontend\HomeController@video')->name('video');
Route::get('/qui-sommes-nous', 'Views\Frontend\HomeController@qui')->name('qui');
Route::get('/documentation', 'Views\Frontend\HomeController@documentation')->name('documentation');
Route::get('/echos-des-secteurs', 'Views\Frontend\HomeController@secteur')->name('secteur');
Route::post('/', 'Views\Frontend\HomeController@saveContact')->name('contact.store');
Route::get('nous-rejoindre', function () {
    return redirect()->to('/boukarians/nous-rejoindre');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Views\Backend\AuthController@login')->name('admin.login');
    Route::post('/login', 'Views\Backend\AuthController@signin')->name('admin.dologin');
    Route::get('/forgot', 'Views\Backend\AuthController@forgotPassword')->name('admin.forgot');
    Route::post('/forgot', 'Views\Backend\AuthController@sendLink')->name('admin.sendlink');
    Route::get('/reset/{token}', 'Views\Backend\AuthController@showResetForm')->name('admin.reset');
    Route::post('/reset', 'Views\Backend\AuthController@doResetPassword')->name('admin.doreset');
    Route::get('/request', 'Views\Backend\AuthController@requestPassword')->name('admin.request');

    Route::group(['middleware' => ['admin_auth', 'admin']], function () {
        Route::get('logout', 'Views\Backend\AuthController@logout')->name('admin.logout');
        Route::get('/', 'Views\Backend\HomeController@dashboard')->name('admin.dashboard');
        Route::get('users', 'Views\Backend\HomeController@users')->name('admin.users');
        Route::get('files', 'Views\Backend\HomeController@files')->name('admin.files');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'Views\Backend\UserController@index')->name('admin.users');
        Route::post('/', 'Views\Backend\UserController@store')->name('admin.users.store');
        Route::get('create', 'Views\Backend\UserController@create')->name('admin.users.create');
        Route::get('{id}/edit', 'Views\Backend\UserController@edit')->name('admin.users.edit');
        Route::get('{id}/show', 'Views\Backend\UserController@show')->name('admin.users.show');
        Route::delete('{id}', 'Views\Backend\UserController@destroy')->name('admin.users.delete');
        Route::put('{id}', 'Views\Backend\UserController@update')->name('admin.users.update');
        Route::get('{id}/blocked', 'Views\Backend\UserController@blocked')->name('admin.users.blocked');

        Route::group(['prefix' => 'roles'], function () {
            Route::get('/', 'Views\Backend\RoleController@index')->name('admin.roles');
            Route::post('/', 'Views\Backend\RoleController@store')->name('admin.roles.store');
            Route::get('create', 'Views\Backend\RoleController@create')->name('admin.roles.create');
            Route::get('{id}/edit', 'Views\Backend\RoleController@edit')->name('admin.roles.edit');
            Route::get('{id}/show', 'Views\Backend\RoleController@show')->name('admin.roles.show');
            Route::delete('{id}', 'Views\Backend\RoleController@destroy')->name('admin.roles.delete');
            Route::put('{id}', 'Views\Backend\RoleController@update')->name('admin.roles.update');
        });

        Route::group(['prefix' => 'permissions'], function () {
            Route::get('/', 'Views\Backend\PermissionController@index')->name('admin.permissions');
            Route::post('/', 'Views\Backend\PermissionController@store')->name('admin.permissions.store');
            Route::get('create', 'Views\Backend\PermissionController@create')->name('admin.permissions.create');
            Route::get('{id}/edit', 'Views\Backend\PermissionController@edit')->name('admin.permissions.edit');
            Route::get('{id}/show', 'Views\Backend\PermissionController@show')->name('admin.permissions.show');
            Route::delete('{id}', 'Views\Backend\PermissionController@destroy')->name('admin.permissions.delete');
            Route::put('{id}', 'Views\Backend\PermissionController@update')->name('admin.permissions.update');
        });

        Route::group(['prefix' => 'send'], function () {
            Route::get('/', 'Views\Backend\PaswordMailController@envoi')->name('admin.envoi');

        });
    });

    Route::any('{all}', function(){
        return view('errors.404-backend');
    })->where('all', '.*');

});
