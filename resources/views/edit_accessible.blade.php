<!-- edit.blade.php -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulário de Edição</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <h2>Editar Formulário</h2><br  />
        <form method="post" action="{{action('AccessibleController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="id">Id:</label>
            <input type="id" class="form-control" name="id" value="{{$accessible->id}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="titulo">Titulo</label>
              <input type="text" class="form-control" name="titulo" value="{{$accessible->titulo}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="descricao">Descricao:</label>
              <input type="text" class="form-control" name="descricao" value="{{$accessible->descricao}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Enviar</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>