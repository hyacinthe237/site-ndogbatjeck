<?php

Route::group(['middleware' => 'web', 'prefix' => 'partenaires', 'namespace' => 'Modules\Partner\Http\Controllers'], function()
{
    Route::get('/', 'Frontend\PartnerController@index');
    Route::get('{code}', 'Frontend\PartnerController@show')->name('partenaires.show');
});



Route::group([
    'middleware' => 'web',
    'prefix' => 'admin/partners',
    'namespace' => 'Modules\Partner\Http\Controllers'
], function () {
        Route::get('/', 'Backend\PartnerController@index')->name('admin.partners');
        Route::post('/', 'Backend\PartnerController@store')->name('admin.partners.store');
        Route::get('create', 'Backend\PartnerController@create')->name('admin.partners.create');
        Route::get('{id}/edit', 'Backend\PartnerController@edit')->name('admin.partners.edit');
        Route::put('{id}', 'Backend\PartnerController@update')->name('admin.partners.update');
        Route::get('/destroy/{id}', 'Backend\PartnerController@destroy')->name('admin.partners.delete');
});
