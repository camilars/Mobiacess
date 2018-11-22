@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Página Inicial</div>

                <!-- <a class="btn btn-primary" href="{{action('UserController@create')}}">Cadastro do Usuário</a> -->
<!--                 <a class="btn btn-primary" href="{{action('AccessibleController@create')}}">Cadastro da Acessibilidade</a>
 -->                
                    <a class="btn btn-primary" href="{{action('LocalController@create')}}">Cadastrar Local</a>
                    <a class="btn btn-primary" href="{{action('LocalController@rotas')}}">Acessar Mapa</a>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Você está logado!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
