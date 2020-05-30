<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manutencao extends Model
{
    public function veiculo()
    {
        return $this->belongsTo('App\Veiculo');
    }

    public function mecanico()
    {
        return $this->belongsTo('App\Mecanico');
    }

    public function user() 
    {
        return $this->belongsTo('App\User');
    }
}
