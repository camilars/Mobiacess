<!-- edit.blade.php -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <br><h2><center>Editar Usuário</center></h2><br/>
        <form method="post" action="{{action('UserController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="cpf">CPF</label>
              <input type="text" class="form-control" name="cpf" value="{{$user->cpf}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email" value="{{$user->email}}">
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="password">Password:</label>
              <input type="text" class="form-control" name="password" value="{{$user->password}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:30px">
            <button type="submit" class="btn btn-success" style="margin-left:78px" onclick="return confirm('Atualizar os dados alterados?')">Atualizar</button>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
          <div class="form-group col-md-4" style="margin-top:-53px; margin-left:560px";>
            <a href="{{action('LocalController@index')}}"><button type="submit"  class="btn btn-danger">Cancelar</button></a>
          </div>
      </div>
      </form>
    </div>
  </body>
</html>