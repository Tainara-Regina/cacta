@extends('adminContratante.base')


@section('titulo')
<title>Cacta - Admin Home</title>
@stop

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
crossorigin="anonymous">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/css/adminContrate/menu-admin.css')}}">
<link rel="stylesheet" href="{{asset('/css/layout-padrao.css')}}">
<link rel="stylesheet" href="{{asset('/css/adminContrate/meus-dados.css')}}">
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

<script type="text/javascript">
	$(document).ready(function(){
		$('#id_segmento').one('change', function (e) {
			$('#myModal').modal('show');
		});

	});


</script>
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
			<p class="text-left title-page p-0 m-0" >Meus dados</p>
			<p class="text-left w p-0 m-0" >Atualize os dados da empresa.</p>
			<hr class="line" style="">
		</div>
	</div>

	<div class="row">
		<div class="col-md-9">
			
			<form action="{{route('site.cadastrar-meus-dados')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<section class="form" style="padding: 0 10%">
					<input type="hidden" id="logradouro" name="logradouro" value="{{$cadastro->logradouro}}">
					<input type="hidden" id="bairro" name="bairro" value="{{$cadastro->bairro}}">
					<input type="hidden" id="localidade" name="localidade" value="{{$cadastro->localidade}}">
					<input type="hidden" id="uf" name="uf" value="{{$cadastro->uf}}">


					@error('logo_atualizar')
					<span style="color: red">{{ $message }}</span>
					@enderror
					<div class="form-group">
						<label for="pwd">Logo da empresa</label>
						<span class="btn btn-primary btn-file ml-5">
							Trocar logo <input name="logo_atualizar" type='file' placeholder="Insira o logo da empresa" onchange="readURL(this);" />
						</span>

						<img id="blah" style="max-width:180px; max-height: 180px; border-radius: 10px;    margin-left: 10px;" src="/storage/{{$cadastro->logo}}" alt="your image" />
					</div>


					@error('id_segmento')
					<span style="color: red">{{ $message }}</span>
					@enderror
					<div class="form-group my-5">
						<div class="main">
							<label for="pwd">Selecione o segmento da sua empresa</label>
							<select id="id_segmento" value="{{$cadastro->id_plano}}" name="id_segmento">
								@foreach ($segmentos as $segmento)
								@if($segmento->id == $cadastro->id_segmento)
								<option  value="{{ $cadastro->id_segmento }}" selected>{{ $segmento->segmento }}</option>
								@else
								<option  value="{{ $segmento->id }}">{{ $segmento->segmento }}</option>
								@endif
								@endforeach
							</select>
						</div>
					</div>

					@error('cep')
					<span style="color: red">{{ $message }}</span> <br>
					@enderror

					@error('endereco')
					<span style="color: red">{{ $message }}</span>
					@enderror

					<div class="form-group">
						<label for="email">Endereço</label>
						<input type="text" value="{{ $cadastro->cep }}" name="cep" placeholder="Digite o CEP" type="text" class="form-control cep">

						<input name="endereco" value="{{ $cadastro->endereco }}" class="mt-2 form-control endereco"  rows="5" id="comment" >

						@error('numero')
						<div class="mt-3">
							<span style="color: red">{{ $message }}</span>
						</div>
						@enderror

						<input style="width: 100px!important" type="text" value="{{ $cadastro->numero }}" name="numero" placeholder="Número" type="text" class="form-control mt-3" maxlength="5">
					</div>


					<div class="form-group">
						<label for="email">Complemento</label>
						<textarea class="mt-2 form-control" name="complemento" placeholder='Digite o complemento do endereço.' rows="5" id="comment"> {{ $cadastro->complemento }}</textarea>
					</div>


					@error('sobre')
					<span style="color: red">{{ $message }}</span>
					@enderror
					<div class="form-group">
						<label for="pwd">Fale sobre sua empresa</label>
						<textarea name="sobre" value="{{old('sobre')}}" placeholder="Faça um resumo sobre sua empresa.Tente falar sobre a tragetoria, missão, visão e valores." class="form-control" rows="5" id="comment"> {{ $cadastro->sobre }}</textarea>
					</div>


					<label for="comment">Redes sociais:</label>
					<div class="form-group">
						<input name="facebook" value="{{ $cadastro->facebook }}" type="text" class="form-control" placeholder="Facebook">
					</div>

					<div class="form-group">
						<input name="instagram" value="{{ $cadastro->instagram }}" placeholder="Instagram" type="text" class="form-control">
					</div>

					<div class="form-group">
						<input name="twitter" value="{{ $cadastro->twitter }}" placeholder="Twitter" type="text" class="form-control">
					</div>

					<div class="form-group">
						<input name="site" placeholder="Site" value="{{ $cadastro->site }}" type="text" class="form-control">
					</div>
				</section>


				<div class="row"> 
					<div class="col text-center"> 
						<button type="submit" class="btn btn-success  text-center py-2 px-5 text-uppercase"> <b>Atualizar</b></button>
					</div>
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


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
	Open modal
</button>

<!-- The Modal -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<p class="text-center"><b>Atenção!</b></p>
				<p>Ao trocar o segmento e salvar a alteração, todas as suas vagas cadastradas do segmento anterior serão excluidas.</p>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Ok, entendi</button>
			</div>

		</div>
	</div>
</div>





@stop