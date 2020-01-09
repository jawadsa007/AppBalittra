<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analis extends Model
{
    public function permintaan()
    {
    	return $this->belongsTo('App\Permintaan');
    }
}
