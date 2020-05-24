<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Saida;
use App\Veiculo;
use App\User;
use Illuminate\Http\Request;

class EntradaController extends Controller
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
    
        $saida = Saida::find((int)$request->saida_id);

        $veiculo = Veiculo::find((int)$request->carro_id);
        $veiculo->kmatual = (int)$req->km;
        $veiculo->save();

        $funcionario = User::find((int)$request->user_id);

        $entrada = new Entrada();
        $entrada->veiculo()->associate($veiculo);
        $entrada->user()->associate($funcionario);
        $entrada->save();

        $saida->entrada()->associate($entrada);
        
        $saida->save();

        return response()->json(["dados" => $entrada, "erros" => 0]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function show(Entrada $entrada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrada $entrada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrada $entrada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrada $entrada)
    {
        //
    }
}
