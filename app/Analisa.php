<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analisa extends Model
{
    public function kategori()
    {
    	return $this->belongsTo('App\Kategori');
    }
}
