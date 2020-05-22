@extends('adminCandidato.base')


@section('titulo')
<title>Cacta Vagas - Preferências</title>
@stop

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
crossorigin="anonymous">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/css/adminContrate/menu-admin.css')}}">
<link rel="stylesheet" href="{{asset('/css/layout-padrao.css')}}">
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

@stop


<!-- O correto é este -->
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
			<p class="text-left title-page p-0 m-0" >Preferencias</p>
			<p class="text-left w p-0 m-0" >Atualize suas preferências.</p>
			<hr class="line" style="">
		</div>
	</div>

	<div class="row">
		<div class="col-md-9">
			<form action="{{route('cadastrar-preferencias')}}" id="formPart1" method="POST" enctype="multipart/form-data">
				@csrf



	@error('id_segmento_enterece')
					<span style="color: red">{{ $message }}</span>
					@enderror
					<div class="form-group my-5">
						<div class="main">
							<label for="pwd">Segmento de enterece para encontrar vagas relacionadas</label>
							<select id="id_segmento" value="{{$cadastro->id_segmento_enterece}}" name="id_segmento_enterece">
								@foreach ($segmentos as $segmento)
								@if($segmento->id == $cadastro->id_segmento_enterece)
								<option  value="{{ $cadastro->id_segmento }}" selected>{{ $segmento->segmento }}</option>
								@else
								<option  value="{{ $segmento->id }}">{{ $segmento->segmento }}</option>
								@endif
								@endforeach
							</select>
						</div>
					</div>



				<div class="form-group">
					<label for="email"><b>Excluir permanentemente seu cadastro</b></label>
					<a href="{{route('excluir-conta')}}">Excluir permanentemente sua conta?</a>
				</div>


				@error('disponivel_banco_candidatos')
				<span style="color: red">{{ $message }}</span>
				@enderror

				@if($preferencias->disponivel_banco_candidatos == true)
				<label class="form-check-label" for="check1">
					<input name="disponivel_banco_candidatos" type="checkbox" class="form-check-input" checked="">Ficar disponivel no banco de candidatos?
				</label>
				@elseif($preferencias->disponivel_banco_candidatos == false)
				<label class="form-check-label" for="check1">
					<input name="disponivel_banco_candidatos" type="checkbox" class="form-check-input">Ficar disponivel no banco de candidatos?
				</label>
				@endif


				<div class="form-group mt-3">
					<button type="submit" class="btn btn-primary mb-5">Prosseguir</button>
				</div>


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
</div>
@stop