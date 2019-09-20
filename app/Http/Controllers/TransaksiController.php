<?php

namespace App\Http\Controllers;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Auth;

class TransaksiController extends Controller
{
    public function index()
    {
    	$data = Transaksi::all();
    	return response($data);
    }
    public function show($id)
    {
    	$data = Transaksi::where('id',$id)->get();
    	return response ($data);
    }
    public function add(Request $request)
    {
    	$transaksi = new Transaksi();
    	$user = JWTAuth::parseToken()->authenticate();

    	$transaksi->username = $user->username;
    	$transaksi->jenis = $request->jenis;
    	$transaksi->nama_transaksi = $request->nama_transaksi;
    	$transaksi->jumlah = $request->jumlah;
    	$jml_saldo = $user->jml_saldo;

    	if($request->jenis == "kredit"){
    		$saldo_sekarang = $user->jml_saldo - $request->jumlah;
    	}elseif ($request->jenis == "debit") {
    		$saldo_sekarang = $user->jml_saldo - $request->jumlah;
    	}else{
    		return "jenis";
    	}
    	$transaksi->save();

   		$user->jml_saldo = $saldo_sekarang;
   		$user->save();

   		return 
   		"Username 			: " .$user->username."
   		Jenis Transaksi 	: " .$request->jenis."
   		Nama Transaksi 	: " .$request->nama_transaksi."
   		Jumlah Saldo 		: " .$saldo_sekarang."
   		Pembayaran 		: " .$request->jumlah."
   		Saldo Sekarang 	: " .$saldo_sekarang;	
    }
}
