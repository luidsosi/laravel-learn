<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientFormRequest;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::query()->orderBy('name')->get();

        return view('client.index', ['clients' => $clients, 'message'=> $request->session()->get('message')]);
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(ClientFormRequest $request)
    {
        $newClient = (Client::create([
            'name' => $request->nome
        ]));
        $request->session()->flash('message', "O novo cliente {$newClient->name} foi inserido com sucesso!");

        return redirect('/client');
    }

    public function delete(Request $request)
    {
        Client::destroy($request->id);
        $request->session()->flash('message', "O cliente foi removido com sucesso!");
        return redirect('/client');
    }
}
