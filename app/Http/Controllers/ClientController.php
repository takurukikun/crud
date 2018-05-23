<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::get();
    	return view('client.index', ['clients' => $clients]);
    }
    public function form(){
    	return view('client.form');
    }

    public function save(Request $request){
    	$client = new Client();
        $val = $request->validate([
            'full_name' => 'required|string|max:64',
            'acc_name' => 'required|string|max:32|min:8|unique:clients',
            'cpf' => 'required|string|max:14|min:11'
        ]);
        $client->create([
            'full_name' => $request['full_name'],
            'acc_name' => $request['acc_name'],
            'cpf' => $request['cpf']
        ]);
    	\Session::flash('msg_success', 'Cliente cadastrado com sucesso.');

    	return redirect('client/form');
    }
    public function register(Request $request){
        $this->validator($request->all())->validate();
    }
    public function edit($id){
        $client = Client::FindOrFail($id);
        return view('client.form', ['client' => $client]);
    }
    public function update($id, Request $request){
        \Session::flash('msg_update', 'Cliente atualizado com sucesso.');
        $client = Client::FindOrFail($id);
        $client->update($request->all());
        return Redirect::to('client/'.$client->id.'/edit');
    }
    public function delete($id){
        \Session::flash('msg_deleted', 'Cliente deletado com sucesso.');
        $client = Client::FindOrFail($id);
        $client->delete();
        return Redirect::to('client');
    }
}
