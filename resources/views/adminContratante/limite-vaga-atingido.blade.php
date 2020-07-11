@extends('adminContratante.base')


@section('titulo') 
<title>Cacta Vagas - Limite atingido</title>
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


@section('conteudo')
<div class="container-fluid">
	<div class="row  p-0 m-0">
		<div class="col w p-0 m-0">
			<span class="text-right nome-empresa" style="">{{\Auth::user()->nome_empresa}}</span><br>
			<i> <span class="text-center staticText" id = "staticText" >"Ser empreendedor é <span style="color: green" id="typeline" ></span>"</span></i> <br>
			-<span class="cacta"> Cacta</span>
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


<div class="container-fluid  py-0 my-0">



	<div class="row">
		<div class="col text-center mb-5">


			@if(session()->has('message'))
			<div class="alert alert-success alert-dismissible py-4">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h4>{{ session()->get('message') }}</h4>
			</div>
			@endif

		</div>	
	</div>









	<div class="row p-0 m-0">
		<div class="col mb-3">
			<p class="text-left title-page" >Cadastrar nova vaga</p>
			<hr class="line" style="">
		</div>
	</div>


	<div class="row">
		<div class="col-sm-4">
			<div class="row b m-1">
				<div class="col p-3">
					<p class="w">Total de vagas divulgadas</p>
					<p class="total">{{$quantidade_de_vagas_cadastradas}}<span>/{{$quantidade_maxima_vagas_permitidas}}</span></p>
				</div>
				<div class="col-md-4 p-0 m-0  d-none d-md-block">
					<div class="h-100 w-100">
						<div class="mx-auto w-50">
							<i  class=" g fas fa-briefcase pt-5"></i>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="col-sm-4">
			<div class="row b m-1">
				<div class="col p-3">
					<p class="w">Vagas em destaque</p>
					<p class="total">{{$quantidade_destaque_cadastrado}}<span>/{{$quantidade_maxima_destaque_permitido}}</span></p>
				</div>
				<div class="col-md-4 p-0 m-0  d-none d-md-block">
					<div class="h-100 w-100">
						<div class="mx-auto w-50">
							<i class="fas fa-users g pt-5"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	




<div class="row mt-5">
					<div class="col">
						<h2 class="text-center">Limite atingido</h2>
						<h5 class="text-center">Mude de plano para aumentar seu limite e aproveite  outras vantagens.</h5>
						<h5 class="text-center">Se preferir, visualize suas vagas <a href="{{route('site.candidatos-vaga')}}">clicando aqui</a></h5>
					</div>
				</div>




	<div class="row p-0 m-0">
		<div class="col mt-5">
			<hr class="line" style="">
			<p class="text-left title-page" >Outros planos disponiveis</p>
			<h5><a href="{{route('site.cadastrar-meus-dados-pessoais')}}#planos">Clique aqui</a> para visualizar outros planos disponíveis e suas vantagens.</h5>
		</div>
	</div>


	
	<div class="row mt-3">
		@foreach($planos as $plano)
		<div class="col-lg-4 col-8" >
			<div class="card mb-5 mb-lg-0 plano" data-plano="${{$plano->id}}">
				<div class="card-body">
					<h5 class="card-title text-muted text-uppercase text-center">{{$plano->plano}}</h5>
					<h6 class="card-price text-center">${{$plano->preco}}<!-- <span class="period">/mês</span> --></h6>
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


	<div class="row p-0 m-0">
		<div class="col mt-5">
			<p class="text-left title-page" >Seu plano atual</p>
		</div>
	</div>

	<div class="row mb-5">
		<div class="col-lg-4 col-8 ">
			<div class="card mb-5 mb-lg-0 plano">
				<div class="card-body">
					<h5 class="card-title text-muted text-uppercase text-center">{{$plano_atual->plano}}</h5>
					<h6 class="card-price text-center">${{$plano_atual->preco}}<!-- <span class="period">/mês</span> --></h6>
					<hr>
					<ul class="fa-ul">

						<li><span class="fa-li"><i class="fa fa-check"></i></span> {{$plano_atual->quantidade_vagas}} vaga(s) para divulgar por mês <small>(inclui renovar vagas existentes)</small></li>

						@if($plano_atual->vagas_em_destaque == 0)
						<li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Permite destacar suas vagas</li>

						@else
						<li><span class="fa-li"><i class="fa fa-check"></i></span> Permite destacar {{$plano_atual->vagas_em_destaque}} de suas vagas </li>
						@endif


						@if($plano_atual->banco_de_candidatos == 0)
						<li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Banco de candidatos</li>

						@else
						<li><span class="fa-li"><i class="fa fa-check"></i></span> Banco de candidatos</li>
						@endif



						@if($plano_atual->materiais_exclusivos == 0)
						<li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Materiais exclusivos sobre empreendedorismo</li>

						@else
						<li><span class="fa-li"><i class="fa fa-check"></i></span>Materiais exclusivos sobre empreendedorismo</li>
						@endif


					</ul>
					<span class="btn btn-block btn-primary text-uppercase"> Selecionar</span>
				</div>
			</div>
		</div>
	</div>

	
</div> 

@stop




@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('/js/admin/admin-menu.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/admin/adminContratante/home-admin.js')}}"></script>
@stop

