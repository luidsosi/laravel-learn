@extends('layout')

@section('title')
    Adicionar Clientes
@endsection

@section('body')
    @if(!empty($message))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <a href="/client/create" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach ($clients as $client)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $client->name }}

                <a href="#" class="btn btn-info btn-sm"></a>
                <form method="post" action="/client/{{ $client->id }}" onsubmit="return confirm('Tem certeza que deseja excluir {{ addslashes($client->name) }}?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
