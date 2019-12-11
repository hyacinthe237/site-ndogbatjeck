<?php

Route::group([
    'middleware' => 'web',
    'prefix' => 'blog',
    'namespace' => 'Modules\Blog\Http\Controllers\Frontend'], function() {
        Route::get('/', 'BlogController@index');
        Route::get('{slug}', 'BlogController@show')->name('posts.show');
        Route::post('/{id}/comments', 'BlogController@addComment');
        Route::get('/{id}/comments', function () {
            return response()->json($id);
        });
        Route::get('/{id}/comments', 'BlogController@listComments');
});

Route::group([
    'middleware' => 'web',
    'prefix' => 'admin/blog',
    'namespace' => 'Modules\Blog\Http\Controllers'
], function () {
        Route::get('/', 'Backend\BlogController@index')->name('admin.blog');
        Route::post('/', 'Backend\BlogController@store')->name('admin.blog.store');
        Route::get('create', 'Backend\BlogController@create')->name('admin.blog.create');
        Route::get('{id}/edit', 'Backend\BlogController@edit')->name('admin.blog.edit');
        Route::patch('{id}', 'Backend\BlogController@update')->name('admin.blog.update');
});

Route::group([
    'middleware' => 'web',
    'prefix' => 'admin/blog/categories',
    'namespace' => 'Modules\Blog\Http\Controllers'
], function () {
        Route::get('/', 'Backend\PostCategoriesController@index')->name('admin.categories');
        Route::post('/', 'Backend\PostCategoriesController@store')->name('admin.categories.store');
        Route::get('create', 'Backend\PostCategoriesController@create')->name('admin.categories.create');
        Route::get('{id}/edit', 'Backend\PostCategoriesController@edit')->name('admin.categories.edit');
        Route::put('{id}', 'Backend\PostCategoriesController@update')->name('admin.categories.update');
});
