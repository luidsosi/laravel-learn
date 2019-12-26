<?php


namespace App\Http\Controllers;


use App\Client;
use App\Http\Requests\ClientFormRequest;
use Illuminate\Http\Request;

class OrderController
{
    public function index(Request $request)
    {
//        $clients = Client::query()->orderBy('name')->get();

//        return view('client.index', ['clients' => $clients, 'message'=> $request->session()->get('message')]);
        return null;
    }

    public function create()
    {
        return view('order.create');
    }

    public function store(ClientFormRequest $request)
    {
//        $newClient = (Client::create([
//            'name' => $request->nome
//        ]));
//        $request->session()->flash('message', "O novo cliente {$newClient->name} foi inserido com sucesso!");
//
//        return redirect('/client');
        return null;
    }

    public function delete(Request $request)
    {
//        Client::destroy($request->id);
//        $request->session()->flash('message', "O cliente foi removido com sucesso!");
//        return redirect('/client');
        return null;
    }
}
