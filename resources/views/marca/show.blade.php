@extends('base')
@section('content')
    {{-- caso exista a variável msg, exibe uma mensagem --}}
    @if (isset($msg))
        <h3 style="color: red">Marca não encontrado!</h3>
    @else
    {{-- senão, mostra os dados --}}
        <h2>Mostrando dados da marca</h2>
        <p><strong>Nome:</strong> {{ $marca->name }} </p>
        <a href="{{ route('computador.index') }}">Voltar</a>
    @endif
@endsection
