<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    public function entrada()
    {
        return $this->belongsTo('App\Entrada');
    }

    public function veiculo()
    {
        return $this->belongsTo('App\Veiculo');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
