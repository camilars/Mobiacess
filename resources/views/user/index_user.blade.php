@extends('layouts.app')

@section('content')

<!-- <script>
document.querySelector('#formulario').addEventListener('submit', function () {
      $('#formulario').on('submit', function () {

     var confirmado = confirm('Deseja deletar esses dados?');

     if (! confirmado) return false;
});
});

function funcao1()
{

var r = confirm("Tem certeza que deseja excluir este local?");
if (r==true)
  {
  x="você pressionou OK!";
  }
else
  {
  return false;
  }
document.getElementById("demo").innerHTML=x;
}
</script> -->

    <div class="container">
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>CPF</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($users as $user)
      <tr>
        <td>{{$user['name']}}</td>
        <td>{{$user['cpf']}}</td>
        <td>{{$user['email']}}</td>
                
        <td><a href="{{action('UserController@edit', $user['id'])}}" class="btn btn-warning">Editar</a></td>
        <td>
          <form action="{{action('UserController@destroy', $user['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Deletar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
 @endsection