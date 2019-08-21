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
    return view('welcome');
});

//Auth::routes();

Route::auth();
Route::get('/home', 'HomeController@index')->name('home');

//declaration
Route::group(['namespace' => 'declaration', 'middleware' => ['web', 'auth']], function () {
    Route::get('/declaration', 'declarationController@index')->name('declaration_index');
    Route::resource('/declaration', 'declarationController');
    Route::post('/declaration', 'declarationController@store')->name('declaration.store');
});

//manager
Route::group(['namespace' => 'manager', 'middleware' => ['web', 'auth', 'manager']], function () {
    Route::get('/manager', 'managerController@show')->name('manager');
    Route::get('/manager{id}', 'managerController@store')->name('manager.store');
});

//Route::post('/declaration', 'declaration\declarationController@index')->name('declaration_index');
//Route::post('/declaration', 'declarationController@create')->name('declarationCreate');


//// Admin routes
//Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
//    Route::get('login', 'LoginController@index');
//    Route::post('login', 'LoginController@login')->name('admin.login');
//
//    Route::group(['middleware' => 'admin'], function() {
//        Route::get('/', 'DashboardController')->name('admin.dashboard');
//    });
//});
//
//// Site routes
//Route::group(['namespace' => 'Site'], function() {
//    Route::get('/', 'HomeController@index')->name('homepage');
//});






//Route::get('/home', 'HomeController@index')->name('home');

//Route::group(['prefix' => 'manager', 'middleware' => ['web', 'auth', 'manager']], function () {
//
//    Route::get('/',['uses'=>'manager\managerController@show', 'as'=>'manager_index']);
//});



// Admin routes
//Route::group(['prefix' => 'manager', 'namespace' => 'auth'], function() {
////    Route::get('login', 'LoginController@index');
////    Route::post('login', 'LoginController@login')->name('login');
//
//    Route::group(['middleware' => 'manager'], function() {
//        Route::get('manager', 'managerController@show');
//    });
//});
