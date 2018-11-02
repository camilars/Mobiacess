<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista de Acessibilidade</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <a class="btn btn-primary" href="{{action('AccessibleController@create')}}">Cadastrar Acessibilidade</a>
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Descricao</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($accessibles as $accessible)
      <tr>
        <td>{{$accessible['id']}}</td>
        <td>{{$accessible['titulo']}}</td>
        <td>{{$accessible['descricao']}}</td>
                
        <td><a href="{{action('AccessibleController@edit', $accessible['id'])}}" class="btn btn-warning">Editar</a></td>
        <td>
          <form action="{{action('AccessibleController@destroy', $accessible['id'])}}" method="post">
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