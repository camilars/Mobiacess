<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel 5.6 CRUD Tutorial With Example  </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script  data-src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
  </head>
  <body>
    <div class="container">
      <h2>Cadastro de Local</h2><br/>
      <form method="post" action="{{url('locals')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="NameOfLocal">Nome do Local:</label>
            <input type="text" class="form-control" name="NameOfLocal">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Street">Rua:</label>
              <input type="text" class="form-control" name="street">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Burgh">Bairro:</label>
              <input type="text" class="form-control" name="burgh">
            </div>
          </div>
        <!-- <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <strong>Date : </strong>  
            <input class="date form-control"  type="text" id="datepicker" name="date">   
         </div>
        </div> -->

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="City">Cidade:</label>
            <input type="text" class="form-control" name="city">
          </div>
        </div>
         
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="State">Estado:</label>
            <input type="text" class="form-control" name="state">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Cep">Cep:</label>
            <input type="text" class="form-control" name="cep">
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Reference">Ponto de Referência:</label>
            <input type="text" class="form-control" name="reference">
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <input type="file" name="foto">    

            <img id='img-upload'/>
         </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Reference">Acessibilidades:</label><br>
            <input type="checkbox" name="rampa" value="rampa">Rampa<br>
            <input type="checkbox" name="elevador" value="elevador">Elevador<br>
            <input type="checkbox" name="corrimao" value="corrimao">Corrimão<br>
            <input type="checkbox" name="nenhuma" value="nenhuma"> Nenhuma acessibilidade<br>

            <label for="Reference">Outros:</label>

            <input type="text" class="form-control" name="reference">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </div>
      </form>
    </div>
    <script type="text/javascript">  
        $(document).ready( function() {
      function readURL(input) {
        if (input.filename && input.filename[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#img-upload').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.filename[0]);
        }
      }
      $("#imgInp").change(function(){
        readURL(this);
      });   
    });
  
    </script>
  </body>
</html>