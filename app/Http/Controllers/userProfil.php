<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userProfil extends Controller
{
    public function createWallet() {
        return view('createWallet');
    }  
    public function createWalletPost(Request $request) {
        // $name = $request->input('name');
        echo $request->input('cryptoMoney');
        die();
    }
}
