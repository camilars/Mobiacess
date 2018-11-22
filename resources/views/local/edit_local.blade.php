<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editar local</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <br><h2><center>Editar local</center></h2><br/>
        <form method="post" action="{{action('LocalController@update', $id)}}" enctype="multipart/form-data">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Nome de Local:</label>
            <input type="text" class="form-control" name="NameOfLocal" value="{{$local->NameOfLocal}}">
          </div>
        </div>
         <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="number">Cep:</label>
              <input type="text" class="form-control" name="cep" value="{{$local->cep}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="email">Rua:</label>
              <input type="text" class="form-control" name="street" value="{{$local->street}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="number">Bairro:</label>
              <input type="text" class="form-control" name="burgh" value="{{$local->burgh}}">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="number">Cidade:</label>
              <input type="text" class="form-control" name="city" value="{{$local->city}}">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="number">Estado:</label>
              <input type="text" class="form-control" name="state" value="{{$local->state}}">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="number">Ponto de Referência:</label>
              <input type="text" class="form-control" name="reference" value="{{$local->reference}}">
            </div>
          </div>
          </div>
          <div class="row" style="margin-left:170px;">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label>Imagem do Local:</label></br>
              <input type="file" name="foto" value="{{$local->foto}}">    
            </div>
          </div>
        <div class="row" style="margin-left:284px">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-top:60px">
              <button type="submit" class="btn btn-success" onclick="return confirm('Atualizar os dados alterados?')">Atualizar</button>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
          <div class="form-group col-md-4" style="margin-top:-53px; margin-left:922px";>
            <a href="{{action('LocalController@index')}}"><button type="submit"  class="btn btn-danger">Cancelar</button></a>
          </div>
      </div>
      </form>
    </div>
    </div>
  </body>
</html>
