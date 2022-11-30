@extends('base')
@section('content')
    <h2>Computadores Cadastrados</h2>
    @if (!isset($computadores))
        <h3 style="color: red">Nenhum Registro Encontrado!</h3>
    @else
        <table class="data-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Marca</th>
                    <th colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($computadores as $c)
                    <tr>
                        <td>{{ $c->nome }} </td>
                        <td> {{ $c->preco }} </td>
                        <td> {{ $c->marca->name }} </td>
                        <td> <a href="{{ route('computador.show', $c->id) }}">Exibir</a> </td>
                        <td> <a href="{{ route('computador.edit', $c->id) }}">Editar</a> </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">Computadores Cadastrados: {{ $computadores->count() }}</td>
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
