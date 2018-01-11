<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\CreateWalletRequest;
use App\Wallet;

class userProfil extends Controller
{
    public function createWallet() {
        return view('createWallet');
    }

    public function createWalletPost(CreateWalletRequest $request) {

        $key = $request->input('cryptoMoney');
        $key .= Auth::user()->id;
        $key .= Auth::user()->email;
        $key .= date("m-Y G:i:s");
        
        $wallet = new Wallet();
        $wallet->type = $request->input('cryptoMoney');
        $wallet->amount = 0;
        $wallet->userid = Auth::user()->id;
        $wallet->key = sha1(substr($key, 0, 40));
        $wallet->Save();

        return redirect('/home')->with('message','Your wallet has been correctly created');
    }

    public function sendMoney() {
        $wallets = DB::select('SELECT * FROM wallets WHERE userid=:userid', array(
            'userid'=>Auth::user()->id
        ));
        return view("sendmoney", array('wallets'=>$wallets));
    }

    public function wallet($id) {
        $wallet = DB::select('SELECT * FROM wallets WHERE id=:id', array(
            'id'=>$id
        ));
        if ($wallet[0]->userid!=Auth::user()->id) {
            return 'false';
        }
        return view("wallet", array('id'=>$id));
    }

    public function transfert($type, $from, $to, $amount) {
        echo 'TransfertData: '.$type.': '.$amount.'  ( '.$from.' -> '.$to.' )';
        die();
    }

    public function walletTransfertPost(Request $request) {
        $r = $request->all();
        dump($r);
        die();
    }
}
