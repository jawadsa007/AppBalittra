<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function analisa()
    {
    	return $this->hasOne('App\Analisa');
    }

	public function permintaan()
    {
    	return $this->hasMany('App\Permintaan');
    }    
}
