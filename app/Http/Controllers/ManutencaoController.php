<?php

namespace App\Http\Controllers;

use App\Manutencao;
use App\Veiculo;
use App\Mecanico;
use Illuminate\Http\Request;

class ManutencaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manutencoes = Manutencao::all();

        return view('manutencoes.index', compact('manutencoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $veiculos = Veiculo::pluck('modelo', 'modelo');
        $mecanicos = Mecanico::pluck('razaosocial', 'razaosocial');

        return view('manutencoes.create', compact('veiculos', 'mecanicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $manutencao = new Manutencao();

        $mecanico = Mecanico::find($request->mecanico_id);

        $veiculo = Veiculo::find($request->veiculo_id);

        $manutencao->data = $request->data;
        $manutencao->descricao = $request->descricao;
        $manutencao->total = $request->total;
                
        $manutencao->mecanico()->associate($mecanico);
        $manutencao->veiculo()->associate($veiculo);

        $manutencao->save();
        

        return redirect()->route('manutencoes.index')
            ->with('success','Manutenção cadastrada com Sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manutencao  $manutencao
     * @return \Illuminate\Http\Response
     */
    public function show(Manutencao $manutencao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manutencao  $manutencao
     * @return \Illuminate\Http\Response
     */
    public function edit(Manutencao $manutencao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manutencao  $manutencao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manutencao $manutencao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manutencao  $manutencao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manutencao $manutencao)
    {
        //
    }
}
