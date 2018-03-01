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

Route::get('/me', 'FactController@me');
Route::get('/', 'FactController@fact');
Route::get('/import', 'FactController@import')->name('fact.import');
Route::post('/webhook', 'FactController@webhook')->name('webhook');
Route::get('/webhook', 'FactController@setWebhook')->name('webhook.set');