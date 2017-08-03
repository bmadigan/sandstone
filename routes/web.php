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

/*
|--------------------------------------------------------------------------
| Logged in User only routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/companies',                'CompaniesController@index')->name('companies.index');
    Route::get('/companies/create',         'CompaniesController@create')->name('companies.create');
    Route::post('/companies',               'CompaniesController@store')->name('companies.store');
    Route::get('/companies/{id}/edit',      'CompaniesController@edit')->name('companies.edit');
    Route::patch('/companies/{id}',         'CompaniesController@update')->name('companies.update');
    Route::delete('/companies/{id}',        'CompaniesController@destroy')->name('companies.destroy');

    Route::get('/contracts',                'ContractsController@index')->name('contracts.index');
    Route::get('/contracts/create',         'ContractsController@create')->name('contracts.create');
    Route::post('/contracts',               'ContractsController@store')->name('contracts.store');
    Route::get('/contracts/{id}/edit',      'ContractsController@edit')->name('contracts.edit');
    Route::patch('/contracts/{id}',         'ContractsController@update')->name('contracts.update');
    Route::delete('/contracts/{id}',        'ContractsController@destroy')->name('contracts.destroy');
});
