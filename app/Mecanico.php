<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mecanico extends Model
{
    public function manutencoes()
    {
        return $this->hasMany('App\Manutencao');
    }

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'razaosocial', 'logradouro', 'bairro', 'numero', 'cidade'
    ];

}
