@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Clientes
                    <div class="col-md-offset-2 float-right">
                        <a class="btn btn-primary btn-sm" href="{{ url('client/form') }}">Novo</a>
                    </div>
                </div>

                <div class="card-body">
                    
                    <table class="table">
                        <thead>
                            <th>Nome: </th>
                            <th>Nome de Usuário: </th>
                            <th>CPF: </th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td>{{ $client->full_name }}</td>
                                    <td>{{ $client->acc_name }}</td>
                                    <td>{{ $client->cpf }}</td>
                                    <td>
                                        <a class="btn btn-primary a-btn-slide-text" href="/client/{{$client->id}}/edit"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        {{ Form::open(['method' => 'delete', 'url' => 'client/'.$client->id]) }}
                                            <button class="btn btn-primary a-btn-slide-text" type="submit"><i class="fas fa-trash-alt"></i></button>
                                        {{ Form::close() }}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
