<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Veiculo;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class EstatisticaController extends Controller
{
    public function index(){
        return view('estatisticas.index');
    }

    public function geraGrafico()
    {
        $inicio =  new Carbon('first day of January');
        $fim = new Carbon('first day of December');

        $periodo = CarbonPeriod::create($inicio->toDateString(), '1 month', $fim->toDateString());

        $data = array();
        $veiculos = Veiculo::All();

        foreach ($periodo as $i => $date) {
            foreach ($veiculos as $veiculo) {
                $saidas = DB::table('saidas')
                    ->where('veiculo_id', $veiculo->id)
                    ->whereMonth('created_at', $date->month)
                    ->count();

                $veiculoAux[$veiculo->modelo] = $saidas;
            }
            $data[$date->month] = $veiculoAux;
        }

        return response()->json([$data]);
    }
}