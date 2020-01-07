@extends('layout')

@section('title')
    Lista de Clientes
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
                <span id="name-client-{{ $client->id }}">{{ $client->name }}</span>
                <div class="input-group w-50" hidden id="input-name-client-{{ $client->id }}">
                    <input type="text" class="form-control" value="{{ $client->name }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editClient({{ $client->id }})">Confirmar</button>
                        @csrf
                    </div>
                </div>
                <span class="d-flex">
                    <button class="btn btn-warning btn-sm mr-1" onclick="toggleInput({{ $client->id }})">Editar</button>
                <a href="/client/{{ $client->id }}/orders" class="btn btn-info btn-sm mr-1">Detalhes</a>
                <form method="post" action="/client/{{ $client->id }}"
                      onsubmit="return confirm('Tem certeza que deseja excluir {{ addslashes($client->name) }}?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </form>
                </span>
            </li>
        @endforeach
    </ul>
    <script>
        function toggleInput(clientId) {
            const clientName = document.getElementById(`name-client-${clientId}`);
            const inputClient = document.getElementById(`input-name-client-${clientId}`);
            if (clientName.hasAttribute('hidden')) {
                inputClient.hidden = true;
                clientName.removeAttribute('hidden');
            } else {
                clientName.hidden = true;
                inputClient.removeAttribute('hidden');
            }
        }

        function editClient(clientId) {
            const newName = document.querySelector(`#input-name-client-${clientId} > input`).value;
            const token = document.querySelector(`input[name="_token"]`).value;

            let formData = new FormData();
            formData.append('name', newName);
            formData.append('_token', token);

            const url = `/client/${clientId}/edit`;

            fetch(url, {
                body: formData,
                method: 'POST'
            }).then(() => {
                document.getElementById(`name-client-${clientId}`).textContent = newName;
                toggleInput(clientId);
            });
        }
    </script>
@endsection
