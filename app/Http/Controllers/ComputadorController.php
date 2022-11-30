<?php

namespace App\Http\Controllers;

use App\Models\Computador;
use Illuminate\Http\Request;

class ComputadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computadores = Computador::with('marca')->paginate(10);
        return view('computador.index')->with('computadores', $computadores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = MarcaController::getMarcas();
        return view('computador.create')->with('marcas', $marcas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $computador = new Computador();
        $computador->nome = $request->input('nome');
        $computador->preco = $request->input('preco');
        $computador->marca_id = $request->input('marca');
        //dd($computador);
        $computador->save();
        $computadores = Computador::all();
        return view('computador.index')->with('computadores', $computadores)->with('msg', 'Computador cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $computador = Computador::find($id);
        if ($computador) {
            return view('computador.show')->with('computador', $computador);
        } else {
            return view('computador.show')->with('msg', 'Computador não encontado!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $computador = Computador::find($id);
        $marca = MarcaController::getMarcas();
        if ($computador) {
            return view('computador.edit')->with('computador', $computador)->with('marca', $marca);
        } else {
            $computadores = Computador::all();
            return view('computador.index')->with('computadores', $computadores)->with('msg', 'Computador não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $computador = Computador::find($id);
        $computador->nome = $request->input('nome');
        $computador->preco = $request->input('preco');
        $computador->marca_id = $request->input('marca');
        $computador->save();
        $computadores = Computador::all();
        return view('computador.index')->with('computadores', $computadores)->with('msg', 'Computador atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $computador = Computador::find($id);
        $computador->delete();
        $computadores = Computador::all();
        return view('computador.index')->with('computadores', $computadores)->with('msg', 'Computador excluido com sucesso!');
    }
}
