<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = ['tipo','marca','modelo','ano','cor','placa','tanque','renavam','kmcadastro','kmatual','qrcode','disponivel'];

    public function saidas()
    {
        return $this->hasMany('App\Saida');
    }

    public function entradas()
    {
        return $this->hasMany('App\Entrada');
    }

    public function manutencoes()
    {
        return $this->hasMany('App\Manutencao');
    }
}
