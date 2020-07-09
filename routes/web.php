<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Route::get('admin/dashboard', function () {
//     return view('admin.dashboard');
// });



Route::group(['prefix' => 'admin','middleware' => 'auth', 'namespace' => 'admin'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::resource('paypal', 'PaypalController');
    Route::post('/paypal/update/{id}', 'PaypalController@update')->name('paypal.update');
    Route::get('/paypal/delete/{id}', 'PaypalController@destroy')->name('paypal.destroy');


});

Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('admin/users','UserController@index')->name('users.index');
    Route::get('admin/users/create','UserController@create')->name('users.create');
    Route::post('admin/users/store','UserController@store')->name('users.store');
    Route::get('admin/users/edit/{id}','UserController@edit')->name('users.edit');
    Route::post('admin/users/update/{id}', 'UserController@update')->name('users.update');
    Route::get('admin/users/delete/{id}', 'UserController@destroy')->name('users.destroy');

    Route::get('admin/rateconvert','RateConversionController@index')->name('convert.index');
    Route::get('admin/rateconvert/search','RateConversionController@search')->name('convert.search');
    Route::get('admin/rateconvert/create','RateconversionController@create')->name('convert.create');
    Route::post('admin/rateconvert/store','RateconversionController@store')->name('convert.store');


    Route::get('admin/pendingrequest','PendingController@index')->name('pending.index');
    Route::get('admin/pendingrequest/updatestatus/{id}','PendingController@updatestatus')->name('pending.updatestatus');
    Route::get('admin/pendingrequest/edit/{id}', 'PendingController@edit')->name('pending.edit');
    Route::post('admin/pendingrequest/update/{id}', 'PendingController@update')->name('pending.update');

});
