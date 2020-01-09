<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{

	protected $fillable = ['pelanggan_id', 'judul_penelitian','kategori_id', 'jumlah_contoh', 'asal_contoh'];

    public function analisa()
    {
    	return $this->belongsToMany('App\Analisa');
    }

    public function kategori()
    {
    	return $this->belongsTo('App\Kategori');
    }

    public function pelanggan()
    {
    	return $this->belongsTo('App\Pelanggan');
    }

    public function analis()
    {
        return $this->hasOne('App\Analis');
    }
}
