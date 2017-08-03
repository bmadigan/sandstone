<?php

/*
|--------------------------------------------------------------------------
| Public Accessible Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

// Rename this to Dashboard
Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Logged in User only routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function () {
    Route::get('/companies',                'CompaniesController@index')->name('companies.index');
    Route::get('/companies/create',         'CompaniesController@create')->name('companies.create');
    Route::post('/companies',               'CompaniesController@store')->name('companies.store');
    Route::get('/companies/{id}/edit',      'CompaniesController@edit')->name('companies.edit');
    Route::patch('/companies/{id}',         'CompaniesController@update')->name('companies.update');
    Route::delete('/companies/{id}',        'CompaniesController@destroy')->name('companies.destroy');
});
