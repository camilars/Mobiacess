@extends('layouts.app')

@section('content')

<!-- Script do cep -->

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

    <div class="container"><br><br><br>
      <h2><center>Cadastro de Local</center></h2><br/>
      <form method="post" action="{{url('locals')}}" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-md-center">
          <div class="form-group col-md-10">
            <label for="NameOfLocal">Nome do Local:</label>
            <input type="text" class="form-control" name="NameOfLocal" required="">
          </div>
        </div>

        <div class="row justify-content-md-center">
          <div class="form-group col-md-3">
            <label for="Cep">Cep:</label>
            <input type="text" class="form-control" name="cep" id="cep" onblur="pesquisacep(this.value);" maxlength="9" onkeypress="return mask(event, this, '#####-###')" required="">
          </div>
          <div class="form-group col-md-7">
              <label for="Street">Rua:</label>
              <input type="text" class="form-control" name="street" id="rua" required="">
            </div>
        </div>
        
        <div class="row justify-content-md-center">
            <div class="form-group col-md-3">
              <label for="Burgh">Bairro:</label>
              <input type="text" class="form-control" name="burgh" id="bairro" required="">
            </div>
            <div class="form-group col-md-7">
             <label for="City">Cidade:</label>
              <input type="text" class="form-control" name="city" id="cidade" required="">
            </div>
          </div>
        <!-- <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <strong>Date : </strong>  
            <input class="date form-control"  type="text" id="datepicker" name="date">   
         </div>
        </div> -->
        <div class="row justify-content-md-center">
          <div class="form-group col-md-3">
            <label for="State">Estado:</label>
            <input type="text" class="form-control" name="state" id="uf" required="">
          </div>
          <div class="form-group col-md-7">
            <label for="Reference">Ponto de Referência:</label>
            <input type="text" class="form-control" name="reference" required="">
          </div>
        </div>
        <!-- <form id="demo">
          <input type="text" name="latitude" id="latitude">
          <input type="text" name="longitude" id="longitude">
        </form>

        <button onclick="getLocation()"></button> -->

        <div class="row justify-content-md-center" >
          <div class="form-group col-md-3">
            <label for="Latitude">Latitude:</label>
            <input  type="text" class="form-control" name="latitude" id="latitude" required="">
          </div>
           <div class="form-group col-md-7">
            <label for="Longitude">Longitude:</label>
            <input type="text" class="form-control" name="longitude" id="longitude"><br>
            <a class="btn btn-info" onclick="getLocation()" id="butlocalização" required="">Atualizar Localização</a>
          </div>
        </div>

        <div class="row justify-content-md-center">
          <div class="form-group col-md-4">
            <label>Imagem do Local:</label>
            <input style="border-radius: 40px;" type="file" name="foto" required="">    

            <img id='img-upload'/>
         </div>
        </div>
        
        <div class="row justify-content-md-center">
          <div class="form-group col-md-4">
            <label for="Reference">Acessibilidades:</label><br>
            <input class="disabled" type="checkbox" name="rampa" value="Rampa"> Rampa<br>
            <input class="disabled" type="checkbox" name="elevador" value="Elevador" > Elevador<br>
            <input class="disabled" type="checkbox" name="corrimao" value="Corrimão" > Corrimão<br>
            <input class="disabled" type="checkbox" name="nenhuma" value="Nenhuma acessibilidade" > Nenhuma acessibilidade<br>
          </div>
        </div>

        <div class="row justify-content-md-center">
          <div class="form-group col-md-4" style="margin-top:20px">
            <button type="submit" class="btn btn-success" style="margin-left:60px" id="butcadastrar">Cadastrar</button>
          </div>
        </div>
    </div>

    <div class="row justify-content-md-center">
          <div class="form-group col-md-2" style="margin-top:-52px; margin-left:300px">
            <a href="{{action('LocalController@index')}}"><button type="submit"  class="btn btn-danger" id="butcancelar">Cancelar</button></a>
          </div>
        </div>
      </form>
    </div>   
    <script>
// var x = document.getElementById("demo");
// var a = document.getElementById("latitude");
// var b = document.getElementById("longitude");

// function getLocation() {
//   console.log(navigator.geolocation.getCurrentPosition(showPosition));
//     if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(showPosition);
//     } else { 
//         x.innerHTML = "O navegador não suporta a localização.";
//     }
// }

// function showPosition(position) {
//   console.log('hell');
//     a.value = position.coords.latitude; 
//     b.value = position.coords.longitude;
// }
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
window.onload = getLocation;

function showPosition(position) {
    // x.innerHTML = position.coords.latitude;
    // a.innerHTML = "Latitude: "+position.coords.latitude; 
    // b.innerHTML = "Longitude: "+position.coords.longitude;
    var a = document.getElementById("latitude");
    var b = document.getElementById("longitude");

    a.value = position.coords.latitude; 
    b.value = position.coords.longitude;
}

// function setDisabled(state){
//   $('.disabled, select, checkbox').each(function(){
//      $(this).prop("disabled", state);
//   });
// }

// function verificarCheckBox() {
//     var check = document.getElementsByName("Rampa"); 

//     for (var i=0;i<check.length;i++){ 
//         if (check[i].checked == true){ 
//             var check1 = document.getElementsByName("Nenhuma acessibilidade");
//             check1.setDisabled(true);

//         }  else {
//            // CheckBox Não Marcado... Faça alguma outra coisa...
            
//         }
//     }
// }

</script>

@endsection
