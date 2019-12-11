<?php

Route::group([
    'middleware' => 'web',
    'prefix' => 'activites',
    'namespace' => 'Modules\Activity\Http\Controllers\Frontend'], function()
{
    Route::get('/', 'ActivityController@index')->name('activites.index');
    Route::get('{slug}', 'ActivityController@show')->name('activites.show');
    Route::post('/{id}/comments', 'ActivityController@addComment');
    Route::get('/{id}/comments', 'ActivityController@listComments');
});

Route::group([
    'middleware' => 'web',
    'prefix' => 'admin/activites',
    'namespace' => 'Modules\Activity\Http\Controllers'
], function () {
        Route::get('/', 'Backend\ActivitiesController@index')->name('admin.activites');
        Route::post('/', 'Backend\ActivitiesController@store')->name('admin.activites.store');
        Route::get('create', 'Backend\ActivitiesController@create')->name('admin.activites.create');
        Route::get('{id}/edit', 'Backend\ActivitiesController@edit')->name('admin.activites.edit');
        Route::patch('{id}', 'Backend\ActivitiesController@update')->name('admin.activites.update');
});

Route::group([
    'middleware' => 'web',
    'prefix' => 'admin/activites/sujets',
    'namespace' => 'Modules\Activity\Http\Controllers'
], function () {
        Route::get('/', 'Backend\SubjectsController@index')->name('admin.sujets');
        Route::post('/', 'Backend\SubjectsController@store')->name('admin.sujets.store');
        Route::get('create', 'Backend\SubjectsController@create')->name('admin.sujets.create');
        Route::get('{id}/edit', 'Backend\SubjectsController@edit')->name('admin.sujets.edit');
        Route::put('{id}', 'Backend\SubjectsController@update')->name('admin.sujets.update');
});
