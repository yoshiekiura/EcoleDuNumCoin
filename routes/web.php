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

Route::get('/create-wallet', array(
    'as' => 'createWallet',
    'uses' => 'userProfil@createWallet'
))->middleware('auth');

Route::post('/create-wallet', array(
    'as' => 'createWalletPost',
    'uses' => 'userProfil@createWalletPost'
))->middleware('auth');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
