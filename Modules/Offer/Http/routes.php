<?php

Route::group(['middleware' => 'web', 'prefix' => 'offres', 'namespace' => 'Modules\Offer\Http\Controllers\Frontend'], function()
{
    Route::get('/', 'OfferController@index')->name('offers.index');
    Route::get('/{code}', 'OfferController@show')->name('offers.show');
    Route::get('/{code}/souscrire', 'OfferSubmissionController@create')->name('offers.submissions.create');
    Route::post('/{offerId}/souscrire', 'OfferSubmissionController@store')->name('offers.submissions.store');
});

Route::group([
    'middleware' => 'web',
    'prefix' => 'admin/offers',
    'namespace' => 'Modules\Offer\Http\Controllers'
], function () {
        Route::get('/', 'Backend\OfferController@index')->name('admin.offers');
        Route::post('/', 'Backend\OfferController@store')->name('admin.offers.store');
        Route::get('create', 'Backend\OfferController@create')->name('admin.offers.create');
        Route::get('{id}/edit', 'Backend\OfferController@edit')->name('admin.offers.edit');
        Route::put('{id}', 'Backend\OfferController@update')->name('admin.offers.update');
        Route::get('/destroy/{id}', 'Backend\OfferController@destroy')->name('admin.offers.delete');
        Route::get('/souscriptions', 'Backend\OfferSubmissionController@index')->name('admin.offers.submissions');
        Route::get('{id}', 'Backend\OfferSubmissionController@destroy')->name('admin.offers.submissions.delete');
        Route::get('/souscriptions/{code}', 'Backend\OfferSubmissionController@show')->name('admin.offers.submissions.show');
});
