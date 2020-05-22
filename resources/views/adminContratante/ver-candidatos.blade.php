@extends('adminContratante.base')


@section('titulo')
<title>Cacta Vagas - Ver candidatos</title>
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
		<div class="col my-3">
			<a href="{{ URL::previous() }}">
				<div class="col text-left btn-sair  p-0 m-0">
					<i class="fa fa-reply" style="">
					</i>
					<p class="w">Voltar</p>
				</div>
			</a>
		</div>
	</div>


	<div class="row p-0 m-0">
		<div class="col mb-3">
			<p class="text-left title-page" >Vaga {{$vaga_nome->titulo}}</p>
			<hr class="line" style="">
		</div>
	</div>


	<div class="row">

		<div class="col-sm-4">
			<div class="row b m-1">
				<div class="col p-3">
					<p class="w">Total de candidatos da vaga</p>
					<p class="total">{{$total}}</p>
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


	<div class="row mt-4">
		<div class="col mb-2">
			<p class="text-left  title-page">Candidatos</p>
		</div>
	</div>




	<div class="row mb-5">
		<div class="col">
			<div class="row b m-1">
				<div class="col p-3">
					<p class="w">Candidadatos cadastrados</p>
					<table class="table">
						<thead>
							<tr>
								<td class="w">Nome</td>
								<td class="w">Data de cadastro</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							@foreach($candidatos as $candidato)
							<tr>
								<td class="w">{{$candidato->nome}} {{$candidato->sobrenome}}</td>
								<td class="w">{{ Carbon\Carbon::parse($candidato->canditatura_em)->format('d/m/Y')}}</td>
								<td class="text-center">
									<a href="{{route('site.detalhes-candidato',['id_candidato' => $candidato->id ,'id_vaga' => $vaga_nome->id_vaga ])}}" >
										Ver detalhes
										<i style="color: #754026" class="fas fa-arrow-right float-right"></i></a>
										
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>

					<div class="col-md-4  p-3 m-0">
						<div class="h-100 w-100" style="">
							<div class="mx-auto">
								<p class="w p-5">Visualize todas suas vagas clicando <a href="{{route('site.candidatos-vaga')}}">aqui.</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col my-3">
				<a href="{{ URL::previous() }}">
					<div class="col text-left btn-sair  p-0 m-0">
						<i class="fa fa-reply" style="">
						</i>
						<p class="w">Voltar</p>
					</div>
				</a>
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

