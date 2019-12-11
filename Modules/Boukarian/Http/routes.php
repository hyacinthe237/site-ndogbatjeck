<?php


Route::group([
    'middleware' => 'web',
    'prefix' => 'boukarians',
    'namespace' => 'Modules\Boukarian\Http\Controllers'
], function () {
        Route::get('/', 'Frontend\BoukarianController@index')->name('boukarians');
        Route::get('/accompagnement', 'Frontend\AccompagnementController@index')->name('boukarians.accompagnement');
        Route::get('/a-propos', 'Frontend\AProposController@index')->name('boukarians.a_propos');
        Route::get('/devenir-boukarian', 'Frontend\ProjectSubmissionsController@create')->name('boukarians.become-boukarian.create');
        Route::post('/devenir-boukarian', 'Frontend\ProjectSubmissionsController@store')->name('boukarians.become-boukarian.store');
        Route::get('/nous-soutenir', 'Frontend\SupportsController@create')->name('boukarians.support.create');
        Route::post('/supports', 'Frontend\SupportsController@store')->name('boukarian.supports.store');
        Route::get('/nous-rejoindre', 'Frontend\JoinUsController@create')->name('boukarians.joinus.create');
        Route::post('/join-us', 'Frontend\JoinUsController@store')->name('boukarians.joinus.store');
        Route::get('{code}/show', 'Frontend\BoukarianController@show')->name('boukarians.show');
});

Route::group([
    'middleware' => 'web',
    'prefix' => 'admin/projects/soumissions',
    'namespace' => 'Modules\Boukarian\Http\Controllers'
], function () {
        Route::get('/', 'Backend\ProjectSubmissionsController@index')->name('admin.soumissions');
        Route::post('create', 'Backend\ProjectSubmissionsController@create')->name('admin.soumissions.create');
        Route::post('/', 'Backend\ProjectSubmissionsController@store')->name('admin.soumissions.store');
        Route::get('{id}/edit', 'Backend\ProjectSubmissionsController@edit')->name('admin.soumissions.edit');
        Route::get('{id}/show', 'Backend\ProjectSubmissionsController@show')->name('admin.soumissions.show');
        Route::patch('{id}', 'Backend\ProjectSubmissionsController@update')->name('admin.soumissions.update');
        Route::post('{id}/{status}', 'Backend\ProjectSubmissionsController@validated')->name('admin.soumissions.validated');
});

Route::group([
    'middleware' => 'web',
    'prefix' => 'admin/projects/supports',
    'namespace' => 'Modules\Boukarian\Http\Controllers'
], function () {
        Route::get('/', 'Backend\SupportsController@index')->name('admin.supports');
        Route::post('create', 'Backend\SupportsController@create')->name('admin.supports.create');
        Route::post('/', 'Backend\SupportsController@store')->name('admin.supports.store');
        Route::get('{id}/edit', 'Backend\SupportsController@edit')->name('admin.supports.edit');
        Route::get('{id}/show', 'Backend\SupportsController@show')->name('admin.supports.show');
        Route::patch('{id}', 'Backend\SupportsController@update')->name('admin.supports.update');
});
