@extends('site.base')

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
<meta name="theme-color" content="#754026">
<link rel="stylesheet" href="{{asset('/css/inicio.css')}}">
<link rel="stylesheet" href="{{asset('/css/menu.css')}}">
<link rel="stylesheet" href="{{asset('/css/rodape.css')}}">
<link href="https://fonts.googleapis.com/css?family=Francois+One|Indie+Flower|Quicksand|Shadows+Into+Light&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Kulim+Park&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="{{asset('/js/mascara.js')}}"></script>
@stop


@section('titulo')
<title>Cacta Vagas - Cadastre-se para começar a contratar</title>
@stop

@section('conteudo')
<main role="main">
  @include('site.includes.menu')
  <section>
    <div class="container">
      <div class="row">
        <div class="col mt-5 col-10 mx-auto">
          <h2 class="text-h3 text-center" >Olá!</h2>
          <h5 class="text-h3 text-center"> <b>Seja muito bem vindo(a) ao Cacta vagas!</b></h5>
          <h5 class="text-h3 text-center"> <b>Bora encontrar as pessoas certa para sua equipe.</b></h5>

          <p class="text-h3 mt-4" style="font-size: 20px;">
            Nós vamos te ajudar a encontrar as pessoas certas para compor sua equipe. Pessoas que realmente combinam com a sua empresa. Aqui você consegue analizar o perfil completo do candidato antes da entrevista pessoal. 
            Chega de contratar do modo antigo, "as cegas".
            E mais uma vez, seja muito bem vindo(a) ao Cacta vagas!
          </p>
          <p class="text-h3 mt-5 text-center" style="font-size: 20px;"><b>Para começar a contratar, realize seu cadastro preenchendo os dados a seguir:</b></p>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6 mx-auto mt-3">

          <form action="{{route('site.formularioContratanteParte1')}}" id="formPart1" method="POST" enctype="multipart/form-data">

            @csrf

            @error('nome_contratante')
            <span style="color: red">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <label for="nome_contratante"><b>Insira seu nome completo</b></label>
              <input placeholder="Qual o seu nome?" value="{{old('nome_contratante')}}" type="text" name="nome_contratante" class="form-control name" required>
            </div>

            @error('nome_empresa')
            <span style="color: red">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <label for="email"><b>Nome da empresa</b></label>
              <input placeholder="Insira o nome da sua empresa"  value="{{old('nome_empresa')}}" type="text" name="nome_empresa" class="form-control" required>
            </div>


            @error('email')
            <span style="color: red">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <label for="email"><b>E-mail da empresa</b></label>
              <input placeholder="Insira o e-mail" type="email" value="{{old('email')}}" name="email" class="form-control" required>
            </div>


            @error('telefone')
            <span style="color: red">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <label for="telefone"><b>Telefone</b></label>
              <input type="text" value="{{old('telefone')}}" name="telefone" placeholder="Insira o seu telefone" type="text" class="form-control phone_with_ddd" required>
            </div>

            @error('password')
            <span style="color: red">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <label for="password"><b>Senha</b></label>
              <input type="password" name="password" value="{{old('password')}}" placeholder="Defina uma senha" type="text" class="form-control" required>
            </div>

            @error('password_confirmation')
            <span style="color: red">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <label for="repetir_senha"><b>Repetir senha</b></label>
              <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" placeholder="Repetir senha" type="text" class="form-control" required>
            </div>


            
            <div class="form-group form-check mb-5 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" value="true" type="checkbox" name="termos" required> Aceito <a href="{{route('site.termo-uso')}}"> todos os termos do site.</a>
              </label>
            </div>


            <div class="g-recaptcha" data-sitekey="6Ld2DwEVAAAAADI7nTlqa3owIG_ED_qxplTSQ9AP"></div>

            <button type="submit" class="mt-5 btn btn-primary mb-5">Prosseguir</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
</section>
</main>
@stop




@section('rodape')
@include('site.includes.rodape')
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
@stop





