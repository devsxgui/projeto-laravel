@extends('base')
@section('content')
    <h2>Computadores Cadastrados</h2>
    @if (!isset($marcas))
        <h3 style="color: red">Nenhum Registro Encontrado!</h3>
    @else
        <table class="data-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($marcas as $c)
                    <tr>
                        <td>{{ $c->name }} </td>
                        <td> <a href="{{ route('marca.show', $c->id) }}">Exibir</a> </td>
                        <td> <a href="{{ route('marca.edit', $c->id) }}">Editar</a> </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">Marcas Cadastradas: {{ $marcas->count() }}</td>
                </tr>
            </tfoot>
        </table>
    @endif
    @if(isset($msg))
        <script>
            alert("{{$msg}}");
        </script>
    @endif
@endsection
