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

		<form class="form" action="{{route('cadastrar-meus-dados-pessoais')}}" id="formPart1" method="POST" enctype="multipart/form-data">
			@csrf


			<input type="hidden" value="{{$cadastro->id_plano}}" name="id_plano" id="plano" value="{{$cadastro->id_plano}}">



			<input type="hidden" id="logradouro" name="logradouro" value="{{$cadastro->logradouro}}">
			<input type="hidden" id="bairro" name="bairro" value="{{$cadastro->bairro}}">
			<input type="hidden" id="localidade" name="localidade" value="{{$cadastro->localidade}}">
			<input type="hidden" id="uf" name="uf" value="{{$cadastro->uf}}">



			@error('nome')
			<span style="color: red">{{ $message }}</span>
			@enderror
			<div class="form-group">
				<label for="nome">Insira seu primeiro nome completo</label>
				<input placeholder="Qual o seu nome?" value="{{$cadastro->nome}}" type="text" name="nome" class="form-control">
			</div>





			@error('sobrenome')
			<span style="color: red">{{ $message }}</span>
			@enderror
			<div class="form-group">
				<label for="sobrenome">Insira seu primeiro nome completo</label>
				<input placeholder="Qual o seu nome?" value="{{$cadastro->sobrenome}}" type="text" name="sobrenome" class="form-control">
			</div>



			@error('sexo')
			<span style="color: red">{{ $message }}</span>
			@enderror
			<label for="email">Gênero</label>
			<div class="form-check">


				@if($cadastro->sexo == 'feminino')
				<label class="form-check-label">
					<input type="radio" class="form-check-input" value="feminino" name="sexo" checked>Feminino
				</label>
				@else
				<label class="form-check-label">
					<input type="radio" class="form-check-input" value="feminino" name="sexo">Feminino
				</label>
				@endif


				@if($cadastro->sexo == 'masculino')
				<label class="form-check-label  pl-5">
					<input type="radio" value="masculino" class="form-check-input" name="sexo" checked>Masculino
				</label>
				@else
				<label class="form-check-label pl-5">
					<input type="radio" value="masculino" class="form-check-input" name="sexo">Masculino
				</label>
				@endif
			</div>





			@error('telefone')
			<span style="color: red">{{ $message }}</span>
			@enderror
			<div class="form-group mt-3">
				<label for="telefone">Telefone</label>
				<input type="text" value="{{$cadastro->telefone}}" name="telefone" placeholder="Insira o seu telefone" type="text" class="form-control">
			</div>

			@error('data_nascimento')
			<span style="color: red">{{ $message }}</span>
			@enderror
			<div class="form-group">
				<label for="email">Data nascimento</label>
				<input placeholder="Data de nascimento" type="date" value="{{$cadastro->data_nascimento}}" name="data_nascimento" class="form-control">
			</div>


			@error('whatsapp')
			<span style="color: red">{{ $message }}</span>
			@enderror
			<div class="form-group">
				<label for="whatsapp">whatsapp</label>
				<input type="text" value="{{$cadastro->whatsapp}}" name="whatsapp" placeholder="Insira o seu whatsapp" type="text" class="form-control">
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

				<input name="endereco" value="{{ $cadastro->endereco }}" class="mt-2 form-control endereco"  rows="5" id="comment" readonly="readonly">

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




			<label for="comment">Redes sociais:</label>

			<div class="form-group">
				<input name="facebook" value="{{ $cadastro->facebook }}" type="text" class="form-control" placeholder="Facebook"></input>
			</div>

			<div class="form-group">
				<input name="instagram" value="{{ $cadastro->instagram }}" placeholder="Instagram" type="text" class="form-control"></input>
			</div>

			<div class="form-group">
				<input name="twitter" value="{{ $cadastro->twitter }}" placeholder="Twitter" type="text" class="form-control"></input>
			</div>

			<div class="form-group">
				<input name="site" placeholder="Site" value="{{ $cadastro->site }}" type="text" class="form-control"></input>
			</div>




			@error('password_atualizar')
			<span style="color: red">{{ $message }}</span>
			@enderror
			<div class="form-group">
				<label for="password">Atualizar senha de login</label>
				<input type="password" name="password_atualizar" value="{{old('password')}}" placeholder="Defina uma nova senha" type="text" class="form-control">
			</div>

			@error('password_confirmation')
			<span style="color: red">{{ $message }}</span>
			@enderror
			<div class="form-group">
				<label for="repetir_senha">Repita nova senha de login</label>
				<input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" placeholder="Repetir senha" type="text" class="form-control">
			</div>


			<div class="row">
				<div class="col">
					<h2 class="text-center title-page mb-3  mt-5">Dados do cartão</h2>
					<p class="w text-center"><b>Obs:</b> No plano gratuito nenhuma cobrança será realizada, não se preocupe.</p>
				</div>
			</div>

			<div class="form-group b w p-3" style="background-color: #fff">
				<p>Números finais do cartão atual {{substr("$cadastro->numero_cartao",-4)}}</p>
				<p>Vencimento: {{$cadastro->expira_cartao}}</p>
			</div>

			<div class="form-group">
				<h4 class="title-page">Atualizar dados do cartão</h4>
				<a class="btn-primary btn" href="{{route('dados-cartao')}}">Atualizar</a>
			</div>




			

			<div class="row">
				<div class="col">
					<h2 class="text-center mt-5 title-page mb-3">Escolha o plano que deseja</h2>
					<p class="text-center w"><b>Obs:</b> No plano gratuito nenhuma cobrança será realizada, não se preocupe.</p>
				</div>
			</div>

			<div class="row">
				<div class="col text-center mb-3">
					@error('plano')
					<span style="color: red">{{ $message }}</span>
					@enderror
				</div>
			</div>

			<div class="row pricing pb-5">

				@foreach($planos as $plano)

				<div class="col-lg-4 col-8 mx-auto" >
					<div class="card mb-5 mb-lg-0 plano" data-plano="{{$plano->id}}">
						<div class="card-body">
							<h5 class="card-title text-muted text-uppercase text-center">{{$plano->plano}}</h5>
							<h6 class="card-price text-center">${{$plano->preco}}<!-- <span class="period">/periodo</span> --></h6>
							<hr>
							<ul class="fa-ul">

								<li><span class="fa-li"><i class="fa fa-check"></i></span> {{$plano->quantidade_vagas}} vaga(s) para divulgar por mês <small>(inclui renovar vagas existentes)</small></li>

								@if($plano->vagas_em_destaque == 0)
								<li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Permite destacar suas vagas</li>

								@else
								<li><span class="fa-li"><i class="fa fa-check"></i></span> Permite destacar {{$plano->vagas_em_destaque}} de suas vagas </li>
								@endif


								@if($plano->banco_de_candidatos == 0)
								<li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Banco de candidatos</li>

								@else
								<li><span class="fa-li"><i class="fa fa-check"></i></span> Banco de candidatos</li>
								@endif



								@if($plano->materiais_exclusivos == 0)
								<li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Materiais exclusivos sobre emprendedorismo</li>

								@else
								<li><span class="fa-li"><i class="fa fa-check"></i></span>Materiais exclusivos sobre emprendedorismo</li>
								@endif


							</ul>
							<span class="btn btn-block btn-primary text-uppercase"> Selecionar</span>
						</div>
					</div>
				</div>
				@endforeach


			</div>



			<button type="submit" class="btn btn-primary mb-5">Salvar</button>
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