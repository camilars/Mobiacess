@extends('layouts.app')

@section('content')

    <div class="container"><br><br><br>
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Nome do Local</th>
        <th>Cep</th>
        <th>Rua</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Ponto de Referência</th>
        <th>Foto</th>
        <th>Acessibilidade</th>
        @if (Auth::check())
        <th>Outros</th>
        <th colspan="2">Action</th>
        @endif
      </tr>
    </thead>
    <tbody>
      
      @foreach($locals as $local)
      
     
      <tr>
        <td>{{$local['NameOfLocal']}}</td>
        <td>{{$local['cep']}}</td>
        <td>{{$local['street']}}</td>
        <td>{{$local['burgh']}}</td>
        <td>{{$local['city']}}</td>
        <td>{{$local['state']}}</td>
        <td>{{$local['reference']}}</td>
        <td><img src="/images/{{$local['foto']}}" style="width:70px; height:70px;"></td>
        <td>{{$local['acessibilidade']}}</td>
        @if (Auth::check())
        <td><a href="{{action('LocalController@edit', $local['id'])}}"  id="butcancelar"  class="btn btn-warning"><i class="fa fa-pencil" style="font-size:20px"></i>Editar</a></td>
        <td>
          <form action="{{action('LocalController@destroy', $local['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit" id="butcancelar"  onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fa fa-times" style="font-size:20px"></i>Deletar</button>
            
          </form>
        </td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  @endsection