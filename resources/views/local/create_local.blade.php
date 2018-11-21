@extends('layouts.app')

@section('content')

<!-- Script do cep -->

 <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
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

  </head>
    <div class="container">
      <h2><center>Cadastro de Local</center></h2><br/>
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
            <label for="Cep">Cep:</label>
            <input type="text" class="form-control" name="cep" id="cep" onblur="pesquisacep(this.value);" maxlength="9" onkeypress="return mask(event, this, '#####-###')">
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Street">Rua:</label>
              <input type="text" class="form-control" name="street" id="rua">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Burgh">Bairro:</label>
              <input type="text" class="form-control" name="burgh" id="bairro">
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
            <input type="text" class="form-control" name="city" id="cidade">
          </div>
        </div>
         
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="State">Estado:</label>
            <input type="text" class="form-control" name="state" id="uf">
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
            <label>Imagem do Local:</label>
            <input type="file" name="foto">    

            <img id='img-upload'/>
         </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Reference">Acessibilidades:</label><br>
            <input type="checkbox" name="rampa" value="rampa"> Rampa<br>
            <input type="checkbox" name="elevador" value="elevador"> Elevador<br>
            <input type="checkbox" name="corrimao" value="corrimao"> Corrimão<br>
            <input type="checkbox" name="nenhuma" value="nenhuma"> Nenhuma acessibilidade<br>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:20px">
            <button type="submit" class="btn btn-success" style="margin-left:60px">Cadastrar</button>
          </div>
        </div>
    </div>

    <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:-52px; margin-left:300px">
            <a href="{{action('LocalController@index')}}"><button type="submit"  class="btn btn-danger">Cancelar</button></a>
          </div>
        </div>
      </form>
    </div>
@endsection