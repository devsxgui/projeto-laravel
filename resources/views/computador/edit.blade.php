@extends('base')
@section('content')
    <h2>Atualizar um Computador</h2>
    <form class="form" id="update-form" method="POST" action="{{ route('computador.update', $computador->id) }}">
        @csrf
        @method('PUT')
        <label for="Nome">Nome:</label>
        <input type="text" name="nome" id="nome" required value="{{ $computador->nome }}">
        <label for="Preco">Preço:</label>
        <input type="number" name="preco" id="preco" required value="{{ $computador->preco }}">
        <label for="Marca">Marca:</label>
        <select name="marca" id="marca">
            @if ($marcas)
                @foreach ($marcas as $marca)
                    <option {{ $computador->marca_id == $marca->id ? 'selected' : '' }} value="{{ $marca->id }}"> {{ $marca->name }}</option>
                @endforeach
            @endif
        </select>
    </form>
    <button form="update-form" type="submit">Salvar</button>
    <button form="delete-form" type="submit" value="Excluir" >Excluir</button>
    <form method="POST" class="form" id="delete-form" action="{{ route('computador.destroy', $computador->id) }}">
        @csrf
        @method('DELETE')
    </form>
@endsection
