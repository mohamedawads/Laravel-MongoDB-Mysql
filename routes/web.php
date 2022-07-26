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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function () {
	
	Route::prefix('mongodb')->group(function () {

		Route::get('/', 'UsersMongoController@index')->name('usersmongo.index');
		Route::get('/show/{user}', 'UsersMongoController@show')->name('usersmongo.show');
		Route::get('/create', 'UsersMongoController@create')->name('usersmongo.create');
		Route::post('/store', 'UsersMongoController@store')->name('usersmongo.store');
		Route::get('/edit/{user}', 'UsersMongoController@edit')->name('usersmongo.edit');
		Route::put('/update/{user}', 'UsersMongoController@update')->name('usersmongo.update');
		Route::delete('/destroy/{user}', 'UsersMongoController@destroy')->name('usersmongo.destroy');
		
		Route::get('/friend/{user}', 'UsersMongoController@friend')->name('usersmongo.friend');
		Route::get('/unfriend/{user}', 'UsersMongoController@unfriend')->name('usersmongo.unfriend');
	});
	
	Route::prefix('mysql')->group(function () {

		Route::get('/', 'UsersMysqlController@index')->name('usersmysql.index');
		Route::get('/show/{user}', 'UsersMysqlController@show')->name('usersmysql.show');
		Route::get('/create', 'UsersMysqlController@create')->name('usersmysql.create');
		Route::post('/store', 'UsersMysqlController@store')->name('usersmysql.store');
		Route::get('/edit/{user}', 'UsersMysqlController@edit')->name('usersmysql.edit');
		Route::put('/update/{user}', 'UsersMysqlController@update')->name('usersmysql.update');
		Route::delete('/destroy', 'UsersMysqlController@destroy')->name('usersmysql.destroy');
		
		Route::get('/friend/{user}', 'UsersMysqlController@friend')->name('usersmysql.friend');
		Route::get('/unfriend/{user}', 'UsersMysqlController@unfriend')->name('usersmysql.unfriend');
	});
	
});

