@extends('adminContratante.base')

@section('titulo')
<title>Cacta Vagas - Meus dados pessoais</title>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="{{asset('/js/mascara.js')}}"></script>
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

		<form class="form" action="{{route('site.cadastrar-meus-dados-pessoais')}}" id="formPart1" method="POST" enctype="multipart/form-data">
			@csrf


			<input type="hidden" value="{{$cadastro->id_plano}}" name="id_plano" id="plano" value="{{$cadastro->id_plano}}">


			@error('nome_contratante')
			<span style="color: red">{{ $message }}</span>
			@enderror
			<div class="form-group">
				<label for="nome_contratante">Insira seu nome completo</label>
				<input placeholder="Qual o seu nome?" value="{{$cadastro->nome_contratante}}" type="text" name="nome_contratante" class="form-control" required>
			</div>

			@error('nome_empresa')
			<span style="color: red">{{ $message }}</span>
			@enderror
			<div class="form-group">
				<label for="email"><b>Nome da empresa</b></label>
				<input placeholder="Insira o nome da sua empresa"  value="{{$cadastro->nome_empresa}}" type="text" name="nome_empresa" class="form-control" required>
			</div>


			@error('telefone')
			<span style="color: red">{{ $message }}</span>
			@enderror
			<div class="form-group">
				<label for="telefone"><b>Telefone</b></label>
				<input type="text" value="{{$cadastro->telefone}}" name="telefone" placeholder="Insira o seu telefone" type="text" class="form-control phone_with_ddd" required>
			</div>

			@error('password_atualizar')
			<span style="color: red">{{ $message }}</span>
			@enderror
			<div class="form-group">
				<label for="password"><b>Atualizar senha de login</b></label>
				<input type="password" name="password_atualizar" value="{{old('password')}}" placeholder="Defina uma nova senha" type="text" class="form-control" required>
			</div>

			@error('password_confirmation')
			<span style="color: red">{{ $message }}</span>
			@enderror
			<div class="form-group">
				<label for="repetir_senha"><b>Repita nova senha de login</b></label>
				<input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" placeholder="Repetir senha" type="text" class="form-control" required>
			</div>



			<div class="row">
				<div class="col">
					<h2 class="text-center title-page mb-3  mt-5">Dados do cartão</h2>
					<p class="w text-center"><b>Obs:</b> A cobrança do plano começará após o período gratuito. Cancele quando quiser.
					</p>

				</div>
			</div>



			<div class="form-group b w p-3" style="background-color: #fff">
				<p>Números finais do cartão atual {{substr("$cadastro->numero_cartao",-4)}}</p>
				<p>Vencimento: {{$cadastro->expira_cartao}}</p>
			</div>





			<div class="form-group">
				<h4 class="title-page">Atualizar dados do cartão</h4>
				<a class="btn-primary btn" href="{{route('site.dados-cartao')}}">Atualizar</a>
			</div>


			<div class="row">
				<div class="col">
					<h2 class="text-center title-page mt-5 mb-3">Escolha o plano que deseja</h2>
					<p class="text-center w"><b>Obs:</b> A cobrança do plano começará após o período gratuito. Cancele quando quiser.</p>
				</div>
			</div>

			<div class="row">
				<div class="col text-center mb-3">
					@error('plano')
					<span style="color: red">{{ $message }}</span>
					@enderror
				</div>
			</div>

			<div class="row pricing">

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
								<li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Materiais exclusivos sobre empreendedorismo</li>

								@else
								<li><span class="fa-li"><i class="fa fa-check"></i></span>Materiais exclusivos sobre empreendedorismo</li>
								@endif


							</ul>
							<span class="btn btn-block btn-primary text-uppercase"> Selecionar</span>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<button type="submit" class="btn btn-primary my-5">Salvar</button>
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