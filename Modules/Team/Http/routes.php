<?php

Route::group(['middleware' => 'web', 'prefix' => 'team', 'namespace' => 'Modules\Team\Http\Controllers'], function()
{
    Route::get('/', 'Frontend\MemberController@index');
    Route::get('{code}', 'Frontend\MemberController@show')->name('membres.show');
});



Route::group([
    'middleware' => 'web',
    'prefix' => 'admin/members',
    'namespace' => 'Modules\Team\Http\Controllers'
], function () {
        Route::get('/', 'Backend\MemberController@index')->name('admin.members');
        Route::post('/', 'Backend\MemberController@store')->name('admin.members.store');
        Route::get('create', 'Backend\MemberController@create')->name('admin.members.create');
        Route::get('{id}/edit', 'Backend\MemberController@edit')->name('admin.members.edit');
        Route::put('{id}', 'Backend\MemberController@update')->name('admin.members.update');
        Route::get('/destroy/{id}', 'Backend\MemberController@destroy')->name('admin.members.delete');
});
