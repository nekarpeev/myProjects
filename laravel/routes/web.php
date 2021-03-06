<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
 *
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('post', ['as' => 'post', 'uses' => 'PostController@index']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function() {
  Route::get('admin', 'DashboardController@dashboard')->name('admin.index');
  Route::resource('/category', 'CategoryNameController', ['as'=>'admin']);
} );


Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
	Artisan::call('route:clear');
	Artisan::call('backup:clean');
    return "Кэш очищен.";
});
