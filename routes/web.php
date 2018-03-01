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

if (env('APP_ENV') === 'production') {
    URL::forceSchema('https');
}

Route::get('/', 'FactController@import')->name('fact.import');
Route::get('/telegram', 'FactController@me');
Route::post('/webhook', 'FactController@webhook')->name('webhook');
Route::get('/webhook', 'FactController@setWebhook')->name('webhook.set');