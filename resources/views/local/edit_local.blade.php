@extends('layouts.app')

@section('content')
<script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('cep').value=("");
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            // document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            // document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                // document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

</script>
<script>
function mask(e, id, mask){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)){
        mascara(id, mask);
        return true;
    } 
    else{
        if (tecla==8 || tecla==0){
            mascara(id, mask);
            return true;
        } 
        else  return false;
    }
}
function mascara(id, mask){
    var i = id.value.length;
    var carac = mask.substring(i, i+1);
    var prox_char = mask.substring(i+1, i+2);
    if(i == 0 && carac != '#'){
        insereCaracter(id, carac);
        if(prox_char != '#')insereCaracter(id, prox_char);
    }
    else if(carac != '#'){
        insereCaracter(id, carac);
        if(prox_char != '#')insereCaracter(id, prox_char);
    }
    function insereCaracter(id, char){
        id.value += char;
    }
}
</script>
<!-- <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editar local</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body> -->
    <div class="container">
      <br><h2><center>Editar local</center></h2><br/>
        <form method="post" action="{{action('LocalController@update', $id)}}" enctype="multipart/form-data">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Nome de Local:</label>
            <input type="text" class="form-control" name="NameOfLocal" value="{{$local->NameOfLocal}}" required="">
          </div>
        </div>
         <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="number">Cep:</label>
              <input type="text" class="form-control" name="cep" id="cep" onblur="pesquisacep(this.value);" maxlength="9" onkeypress="return mask(event, this, '#####-###')" value="{{$local->cep}}" required="">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="email">Rua:</label>
              <input type="text" class="form-control" name="street" id="rua" value="{{$local->street}}" required="">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="number">Bairro:</label>
              <input type="text" class="form-control" name="burgh" id="bairro" value="{{$local->burgh}}" required="">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="number">Cidade:</label>
              <input type="text" class="form-control" name="city" id="cidade"value="{{$local->city}}" required="">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="number">Estado:</label>
              <input type="text" class="form-control" name="state" id="uf" value="{{$local->state}}" required="">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="number">Ponto de Referência:</label>
              <input type="text" class="form-control" name="reference" value="{{$local->reference}}" required="">
            </div>
          </div>
          </div>
          <div class="row" style="margin-left:170px;">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label>Imagem do Local:</label></br>
              <input type="file" name="foto" value="{{$local->foto}}" required="">    
            </div>
          </div>
        <div class="row" style="margin-left:284px">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-top:60px">
              <button type="submit" class="btn btn-success" id="butcancelar" onclick="return confirm('Atualizar os dados alterados?')">Atualizar</button>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
          <div class="form-group col-md-4" style="margin-top:-53px; margin-left:922px";>
            <a href="{{action('LocalController@index')}}"><button type="submit" id="butcancelar" class="btn btn-danger">Cancelar</button></a>
          </div>
      </div>
      </form>
    </div>
    </div>
  <!-- </body>
</html> -->
@endsection
