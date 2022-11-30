@extends('base')
@section('content')
    <h2>Atualizar uma Marca</h2>
    <form class="form" id="update-form" method="POST" action="{{ route('marca.update', $marca->id) }}">
        @csrf
        @method('PUT')
        <label for="Nome">Nome:</label>
        <input type="text" name="name" id="name" required value="{{ $marca->name }}">
    </form>
    <button form="update-form" type="submit">Salvar</button>
    <button form="delete-form" type="submit" value="Excluir" >Excluir</button>
    <form method="POST" class="form" id="delete-form" action="{{ route('marca.destroy', $marca->id) }}">
        @csrf
        @method('DELETE')
    </form>
@endsection
