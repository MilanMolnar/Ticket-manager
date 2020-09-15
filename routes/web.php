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
    return view('home');
});


Auth::routes();//All the auth routes

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/ticketlist', 'TicketsController@show')->name('admin');
Route::post('/submit', 'SubmissionController@store');
Route::post('/sort/submit', 'SortingController@submit');
Route::post('/sort/due', 'SortingController@due');
Route::post('/customer', 'SortingController@customer_filter');



