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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'HomeController@index')->name('welcome');
Route::post('/requestproject','RequestprojectController@project')->name('request.project');
Route::post('/contact','ContactController@sendMessage')->name('contact.send');

Auth::routes();




Route::group(['prefix' => 'admin', 'middleware' => 'auth','namespace' => 'admin'],function (){
   Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
   Route::resource('slider','SliderController');
   Route::resource('category','CategoryController');
   Route::resource('project','ProjectController');

   Route::get('requestproject','RequestprojectController@index')->name('requestproject.index');
   Route::post('requestproject/{id}','RequestprojectController@status')->name('requestproject.status');
   Route::delete('requestproject/{id}','RequestprojectController@destroy')->name('requestproject.destroy');

   Route::get('contact','ContactController@index')->name('contact.index');
   Route::get('contact/{id}','ContactController@show')->name('contact.show');
   Route::delete('contact/{id}','ContactController@destroy')->name('contact.destroy');
});

