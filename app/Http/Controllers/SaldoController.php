<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    public function saldo()
    {
    	$data = "Saldo anda : ". Auth::user()->jml_saldo;
    	return response()->json($data, 200);
    }

    public function saldoAuth()
    {
    	$data = "Halo " . Auth::user()->username . " Saldo Anda : " . Auth::user()->jml_saldo;
    	return response()->json($data, 200);
    }
}
