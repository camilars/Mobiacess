<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <a class="btn btn-primary" href="{{action('LocalController@create')}}">Cadastrar Local</a>
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Nome do Local</th>
        <th>Rua</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Cep</th>
        <th>Ponto de Referência</th>
        <th>foto</th>
        <th>Outros</th>

        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($locals as $local)
      
      <tr>
        <td>{{$local['NameOfLocal']}}</td>
        <td>{{$local['street']}}</td>
        <td>{{$local['burgh']}}</td>
        <td>{{$local['city']}}</td>
        <td>{{$local['state']}}</td>
        <td>{{$local['cep']}}</td>
        <td>{{$local['reference']}}</td>
        <td><img src="/images/{{$local['foto']}}" style="width:50px; height:50px;  "></td>
        <td><a href="{{action('LocalController@edit', $local['id'])}}" class="btn btn-warning">Editar</a></td>
        <td>
          <form action="{{action('LocalController@destroy', $local['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Deletar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>