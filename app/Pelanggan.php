<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
	protected $fillable = ['nama_pelanggan', 'nama_instansi', 'alamat', 'no_telp'];

    public function permintaan()
    {
    	return $this->hasMany('App\Permintaan');
    }
}
