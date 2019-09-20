<?php

use Illuminate\Http\Request;

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::post('ubahsaldo/{id}', 'UserController@ubahsaldo');


Route::middleware(['jwt.verify'])->group(function(){
	Route::get('saldo', 'SaldoController@saldo');
	Route::get('ceksaldo', 'SaldoController@saldoAuth');
	Route::get('user', 'UserController@getAuthenticatedUser');
	Route::post('tambahtransaksi', 'TransaksiController@add');
	Route::get('riwayattransaksi/{id}', 'TransaksiController@show');
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
