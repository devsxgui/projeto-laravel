@extends('base')
@section('content')
    <h2>Cadastrar Novo Computador</h2>
    <form class="form" method="POST" action="{{ route('computador.store') }}">
        @csrf
        <label for="Nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <label for="Preco">Preço:</label>
        <input type="number" name="preco" id="preco" required>
        <label for="Marca">Marca:</label>
        <select name="marca" id="marca">
            @if ($marcas)
                @foreach ($marcas as $m)
                    <option value="{{ $m->id }}">{{ $m->name }}</option>
                @endforeach
            @endif
        </select>
        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
    </form>
@endsection
