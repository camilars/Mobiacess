@extends('layouts.app')

@section('content')
<script language="Javascript">
function _cpf(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '');
    if (cpf == '') return false;
    if (cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999")
        return false;
    add = 0;

    for (i = 0; i < 9; i++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;
    add = 0;

    for (i = 0; i < 10; i++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;
    return true;

}

function mask(e, id, mask){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)){
        mascara(id, mask);
        return true;
    } 
    else{
        if (tecla==11 || tecla==0){
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

<script language="Javascript">

function validarCPF(el){
  if( !_cpf(el.value) ){
 
    alert("CPF "+ el.value+" inválido!");
 
    // apaga o valor
    el.value = "";
  }
    
}
</script>

<script language="Javascript">
        function validacaoEmail(field) {
        usuario = field.value.substring(0, field.value.indexOf("@"));
        dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
 
        if ((usuario.length >=1) &&
            (dominio.length >=3) && 
            (usuario.search("@")==-1) && 
            (dominio.search("@")==-1) &&
            (usuario.search(" ")==-1) && 
            (dominio.search(" ")==-1) &&
            (dominio.search(".")!=-1) &&      
            (dominio.indexOf(".") >=1)&& 
            (dominio.lastIndexOf(".") < dominio.length - 1)) {
            document.getElementById("msgemail").innerHTML="E-mail válido";
            alert("E-mail valido");
        }
          else{
            document.getElementById("msgemail").innerHTML="<font color='red'>E-mail inválido </font>";
      alert("E-mail invalido");
}
}
</script>

<div class="container"><br><br><br>
    <div class="row justify-content-center">
        <div id="formWrapper">
            <div id="form">
        <div class="logo">
            <h3 class="text-center head">Cadastrar</h3>
        </div>

        <div class="col-md-8">
            <div class="card" id="card-register">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder ="Digite seu nome" required autofocus >

                                @if ($errors->has('nome'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf') }}" placeholder ="Digite apenas números" required autofocus maxlength="14" onblur="validarCPF(this)" onkeypress="return mask(event, this, '###.###.###-##')">

                                @if ($errors->has('cpf'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder ="tuanno@gmail.com" required 
                                autofocus onblur="validacaoEmail(f1.email)">

                                @if ($errors->has('e-mail'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('e-mail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder ="Quantidade minima 6" required>

                                @if ($errors->has('senha'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('senha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar a Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" placeholder ="Confirmação de Senha" class="form-control" name="password_confirmation"required>
                            </div>
                        </div><br>  
                            
                        

                        <div class="form-group row mb-0" style="margin-left:3%;">
                            <div class="col-md-2 offset-md-4">
                                <button type="submit" style="border-radius:22px;" class="btn btn-primary" id="butcad">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                        <!-- </div> -->
    
                        <!-- <div class="form-group row mb-0" id="cancelar" style="margin-right:-60%; margin-top:-37px;  "> -->
                            <div class="col-md-4 offset-md-4">
                                <a href="{{action('HomeController@index')}}" style="border-radius:22px; margin-left:100%; margin-top:-41%;" class="btn btn-danger">Cancelar</a>
                            </div>    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
@endsection
