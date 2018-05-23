@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Clientes</div>

                <div class="card-body">
                	@if(Session::has('msg_success'))
                		<div class="alert alert-success">
                			{{ Session::get('msg_success') }}
                		</div>
                	@else
        			@if(Session::has('msg_update'))
                		<div class="alert alert-success">
                			{{ Session::get('msg_update') }}
                		</div>
        			@endif

                    @endif
                    @if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
                    @if(Request::is('*/edit'))
                    	{{ Form::model($client, ['method'  => 'PATCH', 'url' => 'client/'.$client->id]) }}
                    @else
                    	{{ Form::open(['url' => 'client/save']) }}
                    @endif

                    {{ Form::label('full_name', 'Nome Completo') }}
                    {{ Form::input('text', 'full_name', old('full_name'), array('class' => 'form-control', 'id' => 'full_name')) }}
                    {{ Form::label('acc_name', 'Login (ID)') }}
                    {{ Form::input('text', 'acc_name', old('acc_name'), array('class' => 'form-control', 'id' => 'acc_name')) }}
                    {{ Form::label('cpf', 'CPF') }}
                    {{ Form::input('text', 'cpf', old('cpf'), array('class' => 'form-control', 'id' => 'cpf')) }} <br />
                    {{ Form::submit('Salvar', array('class' => 'btn btn-group btn-primary', 'id' => 'submit')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
