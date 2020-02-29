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


Auth::routes();


	// Route::get('/home', 'HomeController@index')->name('home');
// Route::group(['domain' => '{subdomain}.address.test'], function () {
//      Route::get('/', function($subdomain){
//         if ($subdomain == 'dashboard') {
//         	return redirect()->action('HomeController@index');
//         }elseif ($subdomain == 'backoffice') {
//         	return redirect()->action('AdminController@index');
//         }
//     })->name('sub'); 
// });

// Route::group(['domain' => 'dashboard.address.test'], function () {
//     Route::get('/', 'HomeController@index');
// });

// Route::group(['domain' => 'backoffice.address.test'], function () {
//     Route::get('/', function()
//     {
//     	return redirect('login');
//     });
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', 'HomeController@index');
// Route::get('/backoffice', 'AdminController@index');
Route::get('/backoffice', function()
{
	if (auth()->user()->role == 'admin') {
		return redirect('admin');
	}else{
		return redirect('op');
	}
});
Route::resource('admin', 'AdminController');
Route::resource('op', 'OperasionalController');
