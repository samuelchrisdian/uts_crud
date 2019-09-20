<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Transaksi extends Model
{
    public $table = "transaksi";
    protected $fillable = [
    	'jenis','nama_transaksi'
    ];
}
