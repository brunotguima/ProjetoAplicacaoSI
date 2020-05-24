<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    public function saida()
    {
        return $this->hasOne('App\Saida');
    }

    public function veiculo()
    {
        return $this->belongsTo('App\Veiculo', 'veiculo_id');
    }

    public function user() 
    {
        return $this->belongsTo('App\User');
    }
}
