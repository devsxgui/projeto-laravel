<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::all();
        return view('marca.index')->with('marcas', $marcas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marca = new Marca();
        $marca->name = $request->input('name');
        $marca->save();
        $marcas = Marca::all();
        return view("marca.index")->with('marcas', $marcas)->with('msg', 'Marca cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marca = Marca::find($id);
        if ($marca) {
            return view('marca.show')->with('marca', $marca);
        } else {
            return view('marca.show')->with('msg', 'Marca não encontrada');
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
        $marca = Marca::find($id);
    if ($marca) {
        return view('marca.edit')->with('marca', $marca);
    } else {
        $marcas = Marca::all();
        return view('marca.index')->with('marcas', $marcas)
            ->with('msg', 'marca não encontrado!');
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
        $marca = Marca::find($id);
        $marca->name = $request->input('name');
        $marca->save();
        $marcas = Marca::all();
        return view('marca.index')->with('marcas', $marcas)->with('msg', 'Marca atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = Marca::find($id);
        $marca->delete();
        $marcas = Marca::all();
        return view('marca.index')->with('marcas', $marcas)->with('msg', 'Marca excluido com sucesso!');
    }

    public static function getMarcas(){
        $marcas = Marca::all();
        return $marcas;
    }
}
