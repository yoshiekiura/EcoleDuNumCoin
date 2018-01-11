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

Route::get('/transfert/{type}/{from}/{to}/{amount}', array(
    'as' => 'transfertMoney',
    'uses' => 'userProfil@transfert'
))->middleware('auth');

Route::get('/send-money', array(
    'as' => 'sendMoney',
    'uses' => 'userProfil@sendMoney'
));

Route::get('/wallet/{id}', array(
    'as' => 'viewWallet',
    'uses' => 'userProfil@wallet'
))->middleware('auth');

Route::post('/walletTransfertPost', array(
    'as' => 'WalletPost',
    'uses' => 'userProfil@walletTransfertPost'
));

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
