<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Admin\HomeController@index');



//default as user
Route::get('login', 'Auth\UserAuthController@getLogin')->name('login');
Route::post('login', 'Auth\UserAuthController@postLogin');


Route::get('ns', 'Api\UserController@ns')->name('ns');

// admin site
Route::get('admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');
Route::post('admin/login', 'Auth\AdminAuthController@postLogin');
Route::post('admin/logout', 'Auth\AdminAuthController@postLogout')->name('logout');



Route::get('logout', 'Auth\AdminAuthController@postLogout')->name('admin.logout');

Route::middleware('auth:admin')->group(function(){
    // Tulis routemu di sini.
    //dd(Auth::user());
    //Route::get('home', 'Admin\HomeController@dashboard')->name('dashboard');
    Route::get('admin/dashboard', 'Admin\HomeController@dashboard')->name('dashboard');

    


  });





// user site
Route::get('user/login', 'Auth\UserAuthController@getLogin')->name('user.login');
Route::post('user/login', 'Auth\UserAuthController@postLogin');
Route::get('user/logout', 'Auth\UserAuthController@postLogout');

Route::middleware('auth:user')->group(function(){
    // Tulis routemu di sini.
    //dd(Auth::user());
    Route::get('home', 'User\HomeController@dashboard')->name('user.dashboard');
    Route::get('user/dashboard', 'User\HomeController@dashboard')->name('user.dashboard2');
    
    
    Route::get('test/masuk', 'User\TestController@masuk');
    Route::get('test/senarai', 'User\TestController@senarai');
    Route::get('test/kemaskini', 'User\TestController@kemaskini');

    Route::post('test/masuk', 'User\TestController@masuk');

  });





Route::get('influx', 'InfluxController@test_connection')->name('influx');
Route::get('NPK_sensor', 'InfluxController@NPK_sensor')->name('NPK_sensor');
Route::get('home', 'InfluxController@select_farm')->name('manage_customer');
Route::get('dashboard1', 'InfluxController@dashboard1')->name('dashboard1');
Route::get('dashboard2', 'InfluxController@dashboard2')->name('dashboard2');
Route::get('dashboard3', 'InfluxController@dashboard3')->name('dashboard3');


Route::get('data_configuration', 'InfluxController@data_configuration')->name('data_configuration');
Route::get('create_user', 'InfluxController@create_user')->name('create_user');
Route::get('edit_user', 'InfluxController@edit_user')->name('edit_user');


Route::post('create_item_configuration', 'InfluxController@create_item_configuration')->name('create_item_configuration');
Route::post('get_list_item', 'InfluxController@get_list_item')->name('get_list_item');
Route::post('delete_item', 'InfluxController@delete_item')->name('delete_item');


Route::post('get_list_plant', 'InfluxController@get_list_plant')->name('get_list_plant');
Route::get('data_configuration_edit/{id_plant}', 'InfluxController@data_configuration_edit')->name('data_configuration_edit');

Route::post('create_new_user', 'InfluxController@create_new_user')->name('create_new_user');
Route::post('edit_new_user', 'InfluxController@edit_new_user')->name('edit_new_user');



Route::post('getDetails_configuration', 'InfluxController@getDetails_configuration')->name('getDetails_configuration');
Route::post('multispectra', 'InfluxController@multispectra')->name('multispectra');
Route::post('get_details_item', 'InfluxController@get_details_item')->name('get_details_item');
