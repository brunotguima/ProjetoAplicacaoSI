<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = ['tipo','marca','modelo','ano','cor','placa','tanque','renavam','kmcadastro','kmatual','qrcode'];
}
