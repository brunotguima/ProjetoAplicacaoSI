<?php

namespace App\Http\Controllers;

use App\Veiculo;
use App\Entrada;
use App\Saida;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;

class VeiculoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $veiculosCadastrados = Veiculo::all();
        foreach ($veiculosCadastrados as $veiculo) {
            if ($veiculo->tipo == 'C') {
                $veiculo->tipo = 'Carro';
            } else if ($veiculo->tipo == 'M') {
                $veiculo->tipo = 'Moto';
            }
        }
        return view('veiculos/index', compact('veiculosCadastrados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('veiculos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'tipo' => 'required|max:5',
            'marca' => 'required',
            'modelo' => 'required',
            'ano' => 'required|numeric',
            'cor' => 'required',
            'placa' => 'required',
            'tanque' => 'required|numeric',
            'renavam' => 'required',
            'kmcadastro' => 'required'
        ]);

        $veiculo = new Veiculo();
        $veiculo->tipo = $request->tipo;
        $veiculo->marca = $request->marca;
        $veiculo->modelo = $request->modelo;
        $veiculo->ano = $request->ano;
        $veiculo->cor = $request->cor;
        $veiculo->placa = $request->placa;
        $veiculo->tanque = $request->tanque;
        $veiculo->renavam = $request->renavam;
        $veiculo->kmcadastro = $request->kmcadastro;
        $veiculo->kmatual = $request->kmcadastro;

        if ($request->hasFile('imagem')) {

            $nomeFinal = $veiculo->tipo . $veiculo->placa;


                    $image = $nomeFinal . '.' . $request->imagem->getClientOriginalExtension();
                    $request->imagem->move(public_path() . '\Images\veiculos', $image);

                    $veiculo->imagem = $image;
                    $veiculo->save();
                } else {
                    $veiculo->save();
                }
        return redirect('/veiculos')->with('sucess', 'Veiculo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Veiculo $veiculo)
    {
        $entradas = DB::table('entradas')
            ->where('veiculo_id', (int) $veiculo->id)
            ->join('users', 'entradas.user_id', '=', 'users.id')
            ->select('entradas.*', 'users.name', 'users.email', 'users.cargo')
            ->get();

        $saidas = DB::table('saidas')
            ->where('veiculo_id', (int) $veiculo->id)
            ->join('users', 'saidas.user_id', '=', 'users.id')
            ->select('saidas.*', 'users.name', 'users.email', 'users.cargo')
            ->get();

        if ($veiculo->tipo == 'C') {
            $veiculo->tipo = 'Carro';
        } else if ($veiculo->tipo == 'M') {
            $veiculo->tipo = 'Moto';
        }

        return view('veiculos/show', compact('veiculo', 'entradas', 'saidas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        return view('edit', compact('veiculo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'ano' => 'required|numeric',
            'cor' => 'required',
            'placa' => 'required',
            'tanque' => 'required|numeric',
            'kmatual' => 'required'
        ]);
        Veiculo::whereId($id)->update($validatedData);

        return redirect('/veiculos')->with('sucesso', 'Veiculo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $veiculoDelete = Veiculo::find($id);
        $veiculoDelete->delete();

        return redirect('/veiculos')->with('sucess', 'O veiculo foi deletado com sucesso!');
    }

    public function createQR($id)
    {
        return QrCode::size(250)->generate($id);
    }

    public function showJSON($id)
    {
        $veiculo = Veiculo::find($id);
        return response()->json($veiculo);
    }
}
