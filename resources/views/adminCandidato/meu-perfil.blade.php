@extends('adminCandidato.base')

@section('titulo')
<title>Cacta - Admin Home</title>
@stop

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
crossorigin="anonymous">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/css/adminContrate/menu-admin.css')}}">
<link rel="stylesheet" href="{{asset('/css/layout-padrao.css')}}">
<link rel="stylesheet" href="{{asset('/css/adminContrate/meus-dados-pessoais.css')}}">
<link href="https://fonts.googleapis.com/css?family=Francois+One|Indie+Flower|Quicksand|Shadows+Into+Light&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/css/rodape.css')}}">
@stop


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('/js/admin/admin-menu.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/admin/adminContratante/meus-dados.js')}}"></script>
<script src="{{asset('/js/formularioContratante-2.js')}}"></script>
@stop



@section('conteudo')

<div class="container-fluid">
	<div class="row  p-0 m-0">
		<div class="col w p-0 m-0">
			@if(session()->has('message'))
			<div class="alert alert-success alert-dismissible py-3 mr-4">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h4>{{ session()->get('message') }}</h4>
			</div>
			@endif
		</div>

		<a href="{{route('cactalogout')}}">
			<div class="col text-right btn-sair  p-0 m-0">
				<i class="fas fa-sign-out-alt" style="">
				</i>
				<p class="w">Sair</p>
			</div>
		</a>
	</div>
</div>


<div class="container-fluid">
	<div class="row p-0 m-0">
		<div class="col mb-3">
			<p class="text-left title-page p-0 m-0" >Meus dados pessoais</p>
			<p class="text-left w p-0 m-0" >Atualize os dados pessoais.</p>
			<hr class="line" style="">
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-9">

		<form class="form" action="{{route('cadastrar-meu-perfil')}}" id="formPart1" method="POST" enctype="multipart/form-data">
			@csrf

			@error('id_segmento_enterece')
			<span style="color: red">{{ $message }}</span>
			@enderror
			<div class="form-group my-5">
				<div class="main">
					<label for="pwd">Selecione o segmento e enterece</label>


					<select id="id_segmento_enterece" value="{{$cadastro->id_plano}}" name="id_segmento_enterece">

						@foreach ($segmentos as $segmento)

						@if($segmento->id == $cadastro->id_segmento_enterece)
						<option  value="{{ $cadastro->id_segmento_enterece}}" selected>{{ $segmento->segmento }}</option>
						@else
						<option  value="{{ $segmento->id }}">{{ $segmento->segmento }}</option>

						@endif

						@endforeach
					</select>
				</div>
			</div>



			@error('escolariedade')
			<span style="color: red">{{ $message }}</span>
			@enderror
			<div class="form-group">
				<label for="escolariedade">escolariedade</label>
				<input type="text" value="{{ $cadastro->escolariedade }}" name="escolariedade" placeholder="escolariedade" type="text" class="form-control">
			</div>



			<div class="form-group">
				<label for="email">Seus sonhos objetivos</label>
				<textarea class="mt-2 form-control" name="sonhos_objetivos" placeholder='Descreva seus sonhos e objetivos' rows="5" id="comment"> {{ $cadastro->sonhos_objetivos }}</textarea>
			</div>



			<div class="form-group">
				<label for="email">Sua historia</label>
				<textarea class="mt-2 form-control" name="sua_historia" placeholder='Sua historia' rows="5" id="comment"> {{ $cadastro->sua_historia}}</textarea>
			</div>

			<div class="form-group">
				<label for="livros">Livros que gostou de ler</label>
				<textarea class="mt-2 form-control" name="livros" placeholder='livros' rows="5" id="comment"> {{ $cadastro->livros}}</textarea>
			</div>


			<div class="form-group">
				<label for="hobbies">hobbies</label>
				<textarea class="mt-2 form-control" name="hobbies" placeholder='hobbies' rows="5" id="comment"> {{ $cadastro->hobbies}}</textarea>
			</div>



			<div class="form-group">
				<label for="cursos_gostaria">Cursos que gostaria de fazer</label>
				<textarea class="mt-2 form-control" name="cursos_gostaria" placeholder='cursos que gostaria de fazer' rows="5" id="comment"> {{ $cadastro->cursos_gostaria}}</textarea>
			</div>

			<button type="submit" class="btn btn-primary mb-5">Prosseguir</button>
		</form>

	</div>


	<div class="col-md-3">
		<div class="w-100 bg-dark" style="height: 500px">
			<p class="text-center">
				Banner
			</p>
		</div>

		<div class="w-100 bg-dark mt-5" style="height: 300px">
			<p class="text-center">
				Banner
			</p>
		</div>
	</div>


</div>

@stop