<?php

Route::group(['middleware' => 'web', 'prefix' => 'projects', 'namespace' => 'Modules\Project\Http\Controllers'], function()
{
    Route::get('/', 'Frontend\ProjectsController@index');
    Route::get('{slug}', 'Frontend\ProjectsController@show')->name('projects.show');

});

Route::group([
    'middleware' => 'web',
    'namespace' => 'Modules\Project\Http\Controllers'], function()
{
    Route::get('/life-units', 'Frontend\ThemesController@index');
    Route::get('/life-units/{slug}', 'Frontend\ThemesController@show')->name('life-units.show');

});

Route::group([
    'middleware' => 'web',
    'prefix' => 'admin/projects',
    'namespace' => 'Modules\Project\Http\Controllers'
], function () {
        Route::get('/', 'Backend\ProjectsController@index')->name('admin.projects');
        Route::post('/', 'Backend\ProjectsController@store')->name('admin.projects.store');
        Route::get('create', 'Backend\ProjectsController@create')->name('admin.projects.create');
        Route::get('{id}/edit', 'Backend\ProjectsController@edit')->name('admin.projects.edit');
        Route::put('{id}', 'Backend\ProjectsController@update')->name('admin.projects.update');
        Route::get('/destroy/{id}', 'Backend\ProjectsController@destroy')->name('admin.projects.delete');
});

Route::group([
    'middleware' => 'web',
    'prefix' => 'admin/projects/themes',
    'namespace' => 'Modules\Project\Http\Controllers'
], function () {
        Route::get('/', 'Backend\ThemesController@index')->name('admin.themes');
        Route::post('/', 'Backend\ThemesController@store')->name('admin.themes.store');
        Route::get('create', 'Backend\ThemesController@create')->name('admin.themes.create');
        Route::get('{id}/edit', 'Backend\ThemesController@edit')->name('admin.themes.edit');
        Route::put('{id}', 'Backend\ThemesController@update')->name('admin.themes.update');
        Route::get('/destroy/{id}', 'Backend\ThemesController@destroy')->name('admin.themes.delete');
});
