<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function analisa()
    {
    	return $this->hasOne('App\Analisa');
    }

	public function permintaa()
    {
    	return $this->belongsTo('App\Permintaan');
    }    
}
