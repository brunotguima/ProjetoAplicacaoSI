<?php

namespace App\Http\Controllers;

use App\Saida;
use App\Veiculo;
use App\User;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class SaidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $request = json_decode($req->getContent());
        // $request = json_decode($req->getContent());

        $validaSaida = Saida::all()->where('veiculo_id', (int)$request->carro_id)->where('entrada_id', null)->first();
        
        //verificando se carro já saiu e não voltou
        if ($validaSaida == null) {
            $saida = new Saida();

            $veiculo = Veiculo::find((int)$request->carro_id);

            $funcionario = User::find((int)$request->user_id);

            $saida->veiculo()->associate($veiculo);

            $saida->user()->associate($funcionario);

            $saida->save();

            return response()->json(["dados" => $saida, "erros" => 0]);
        }else{
            $validaSaida->load('veiculo');
            $validaSaida->load('user');

            return response()->json(["dados" => $validaSaida, "erros" => "Carro saiu, mas não tem entrada cadastrada"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Saida  $saida
     * @return \Illuminate\Http\Response
     */
    public function show(Saida $saida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Saida  $saida
     * @return \Illuminate\Http\Response
     */
    public function edit(Saida $saida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Saida  $saida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saida $saida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Saida  $saida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saida $saida)
    {
        //
    }

    public function teste(Request $request) {
        $inicio = Carbon::parse($request->dataini);
        $fim = Carbon::parse($request->datafim);
        
        $periodo = CarbonPeriod::create($request->dataini, '1 day', $request->datafim);
        
        $data = array();
        
        foreach($periodo as $i => $date) {
            $saidas = DB::table('saidas')->whereDate('created_at', $date)->get();

            $data[$date->toDateString()] = $saidas->count();
        }
        return response()->json($data);
    }

    public function grafico() {
        return view('movimentacao.grafico');
    }
}
