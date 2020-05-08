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
<script src="{{asset('/js/mascaras.js')}}"></script>
@stop


@section('titulo')
<title>Cadastre-se contratante</title>
@stop

@section('conteudo')
@include('site.includes.menu-mobile')
<main role="main">
	@include('site.includes.menu')
	<section>
		<div class="container">
			<div class="row">
				<div class="col mt-5 col-10 mx-auto">
					<h5 class="text-h3 text-center"> <b>Redefinição de senha</b></h5>
					<h5 class="text-h3 text-center"> <b>Insira a nova senha abaixo.</b></h5>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-8 col-lg-8 col-xl-6 mx-auto mt-3">

					<form action="{{route('site.redefinir-update')}}" id="formPart1" method="POST" enctype="multipart/form-data">
						@csrf

						<input type="hidden" name="tipo" value="{{$tipo}}">
						<input type="hidden" name="id" value="{{$user->id}}">

						@error('password')
						<span style="color: red">{{ $message }}</span>
						@enderror
						<div class="form-group">
							<label for="password"><b>Senha</b></label>
							<input type="password" name="password" value="{{old('password')}}" placeholder="Defina uma senha" type="text" class="form-control">
						</div>

						@error('password_confirmation')
						<span style="color: red">{{ $message }}</span>
						@enderror
						<div class="form-group">
							<label for="repetir_senha"><b>Repetir senha</b></label>
							<input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" placeholder="Repetir senha" type="text" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary mb-5">Redefinir</button>
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





