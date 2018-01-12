<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\CreateWalletRequest;
use App\Http\Requests\TransfertMoneyRequest;
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

    public function wallet($id) {
        $wallet = DB::select('SELECT * FROM wallets WHERE id=:id', array(
            'id'=>$id
        ));
        if ($wallet[0]->userid!=Auth::user()->id) {
            return 'false';
        }
        return view("wallet", array('id'=>$id, 'wallet'=>$wallet));
    }

    public function transfert($type, $from, $to, $amount) {
        echo 'TransfertData: '.$type.': '.$amount.'  ( '.$from.' -> '.$to.' )';
        die();
    }

    public function transfertMoneyPost(TransfertMoneyRequest $request) {
        $r = $request->all();
        $fromWallet = $r["currentWalletKey"];
        $toWallet = $r["walletkey"];
        $amount = $r["amount"];

        $walletSender = DB::table('wallets')->where('key', '=', $fromWallet)->get();
        $walletReceiver = DB::table('wallets')->where('key', '=', $toWallet)->get();

        if ($walletSender[0]->type == $walletReceiver[0]->type) {

            DB::table('wallets')->where('key', $fromWallet)->update(['amount' => $walletSender[0]->amount - $amount]);
            DB::table('wallets')->where('key', $toWallet)->update(['amount' => $walletReceiver[0]->amount + $amount]);
            
            return redirect('/home')->with('message', $amount.' '.$walletSender[0]->type.' transfered');
        } else {
            return redirect('/home')->with('errorType','Wallet type error');
        }

    }

    public function offerts() {
        $jsonData = json_decode(file_get_contents('https://api.coinmarketcap.com/v1/ticker/bitcoin/'));

        // dd($jsonData);
        return view('offerts');
    }

    public function walletTransfertPost(Request $request) {
        $r = $request->all();
        dump($r);
        die();
    }
}
