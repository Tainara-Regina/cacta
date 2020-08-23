@extends('site.base')

@section('css')
<meta name="robots" content="index, Nofolow">
<meta name="robots" content="noindex">
<meta name="googlebot" content="noindex">

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
<script src="{{asset('/js/mascaras.js')}}"></script>
@stop


@section('titulo')
<title>Cadastre-se contratante</title>
@stop

@section('conteudo')

<main role="main">
	@include('site.includes.menu')
	<section>
		<div class="container">

			<div class="row">
				<div class="col mt-5 col-10 mx-auto">

					@if(session()->has('nao-cadastrado'))
					<div class="alert alert-danger alert-dismissible py-3 mr-4">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<h4 class="text-center">{{ session()->get('nao-cadastrado') }}</h4>
					</div>
					@endif

					<h5 class="text-h3 text-center"> <b>Informe seu e-mail para redefinir sua senha de candidato</b></h5>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-8 col-lg-8 col-xl-6 mx-auto mt-3">

					<form action="{{route('enviar-redefinir-senha-candidato')}}" id="formDados" method="POST" enctype="multipart/form-data">

						@csrf

						@error('email')
						<span style="color: red">{{ $message }}</span>
						@enderror
						<div class="form-group">
							<label for="email"><b>E-mail</b></label>
							<input type="email" name="email" value="{{old('email')}}" placeholder="Digite seu e-mail" type="text" class="form-control" required="">
						</div>

						<button id="redefinir" type="submit" class="btn btn-primary mb-5">Redefinir</button>
					</form>

					
<script type="text/javascript">
						$(document).ready(function(){
							/*desabilita o submit do form*/
							$("#formDados").submit(function(){
								 $("#redefinir").attr("disabled", true);
								// alert('ssdsdddf');
							});
						});
					</script>

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





