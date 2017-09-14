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

// Default view for the Shopping Cart
Route::get('/cart', 'Web\CartController@show')->name('cart.show');

/*
|--------------------------------------------------------------------------
| Logged in User Web routes
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Web', 'middleware' => 'auth'], function() {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/companies',                'CompaniesController@index')->name('companies.index');
    Route::get('/companies/create',         'CompaniesController@create')->name('companies.create');
    Route::get('/companies/{id}',           'CompaniesController@show')->name('companies.show');
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

    Route::get('/products',                'ProductsController@index')->name('products.index');
    Route::get('/products/create',         'ProductsController@create')->name('products.create');
    Route::get('/products/{id}',           'ProductsController@index')->name('products.show');
    Route::post('/products',               'ProductsController@store')->name('products.store');
    Route::get('/products/{id}/edit',      'ProductsController@edit')->name('products.edit');
    Route::patch('/products/{id}',         'ProductsController@update')->name('products.update');
    Route::delete('/products/{id}',        'ProductsController@destroy')->name('products.destroy');
});


/*
|--------------------------------------------------------------------------
| Standard Authenticated - Vue API Calls
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Api', 'middleware' => 'auth'], function() {

    Route::get('/api/contracts',                'ContractsController@index')->name('contracts.api.index');
    Route::get('/api/contracts/{id}',           'ContractsController@show')->name('contracts.api.show');

    Route::get('/api/products',                 'ProductsController@index')->name('products.api.index');
    Route::get('/api/products/{id}',            'ProductsController@show')->name('products.api.show');

    Route::post('/api/cart/add/{productId}',    'CartController@store')->name('cart.api.add');
    Route::get('/api/cart',                     'CartController@show')->name('cart.api.get');
    Route::post('/api/cart/remove/{rowId}',     'CartController@destroy')->name('cart.api.destroy');

    Route::post('/api/checkout',                'CheckoutController@store')->name('checkout.api.store');
});

/*
|--------------------------------------------------------------------------
| Standard Public Vue API Calls
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Api'], function() {
    Route::get('/api/products',                 'ProductsController@index')->name('products.api.index');
    Route::get('/api/products/{id}',            'ProductsController@show')->name('products.api.show');

    Route::post('/api/cart/add/{productId}',    'CartController@store')->name('cart.api.add');
    Route::get('/api/cart',                     'CartController@show')->name('cart.api.get');
    Route::post('/api/cart/remove/{rowId}',     'CartController@destroy')->name('cart.api.destroy');

    Route::post('/api/checkout',                'CheckoutController@store')->name('checkout.api.store');
});
