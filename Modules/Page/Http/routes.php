<?php

Route::group([
    'middleware' => 'web',
    'prefix' => 'pages',
    'namespace' => 'Modules\Page\Http\Controllers\Frontend'], function() {
        // Route::get('/', 'PageController@index');
        Route::get('{slug}', 'PageController@show')->name('pages.show');
        Route::post('/{id}/comments', 'PageController@addComment');
        Route::get('/{id}/comments', function () {
            return response()->json($id);
        });
        Route::get('/{id}/comments', 'PageController@listComments');
});

Route::group([
    'middleware' => 'web',
    'prefix' => 'admin/pages',
    'namespace' => 'Modules\Page\Http\Controllers'
], function () {
        Route::get('/', 'Backend\PageController@index')->name('admin.pages');
        Route::post('/', 'Backend\PageController@store')->name('admin.pages.store');
        Route::get('create', 'Backend\PageController@create')->name('admin.pages.create');
        Route::get('{id}/edit', 'Backend\PageController@edit')->name('admin.pages.edit');
        Route::patch('{id}', 'Backend\PageController@update')->name('admin.pages.update');
});
