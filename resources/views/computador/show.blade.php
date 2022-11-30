@extends('base')
@section('content')
    {{-- caso exista a variável msg, exibe uma mensagem --}}
    @if (isset($msg))
        <h3 style="color: red">Computador não encontrado!</h3>
    @else
    {{-- senão, mostra os dados --}}
        <h2>Mostrando dados do computador</h2>
        <p><strong>Nome:</strong> {{ $computador->nome }} </p>
        <p><strong>Preço:</strong> {{ $computador->preco }} </p>
        <p><strong>Marca:</strong> {{ $computador->marca->name }} </p>
        <a href="{{ route('computador.index') }}">Voltar</a>
    @endif
@endsection
