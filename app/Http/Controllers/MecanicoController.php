<?php

namespace App\Http\Controllers;

use App\Mecanico;
use Illuminate\Http\Request;

class MecanicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mecanicos = Mecanico::all();

        return view('mecanicos.index', compact('mecanicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mecanicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
    
        $mecanico = Mecanico::create($input);
    
        return redirect()->route('mecanicos.index')
                        ->with('success','Mecânico Criado com Sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mecanico  $mecanico
     * @return \Illuminate\Http\Response
     */
    public function show(Mecanico $mecanico)
    {
        return view('mecanicos.show',compact('mecanico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mecanico  $mecanico
     * @return \Illuminate\Http\Response
     */
    public function edit(Mecanico $mecanico)
    {
        return view('mecanicos.edit',compact('mecanico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mecanico  $mecanico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mecanico $mecanico)
    {
        $input = $request->all();

        $mecanico->update($input);

        return redirect()->route('mecanicos.index')
            ->with('success','Mecânico Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mecanico  $mecanico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mecanico $mecanico)
    {
        $mecanico->delete();

        return redirect()->route('mecanicos.index')
        ->with('success','Mecânico deletado com sucesso!');
    }
}
