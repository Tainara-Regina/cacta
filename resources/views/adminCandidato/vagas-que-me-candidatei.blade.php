@extends('adminCandidato.base')


@section('titulo')
<title>Cacta Vagas- Vagas que me candidatei</title>
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
			<span class="text-right nome-empresa" style="">{{\Auth::user()->nome}}</span><br>
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
	<div class="row p-0 m-0">
		<div class="col mb-3">
			<p class="text-left title-page" >Vagas que me candidatei</p>
			<hr class="line" style="">
		</div>
	</div>


	<div class="row mb-5">


		@foreach($vagas as $vaga)
		<div class="col-sm-4">
			<div class="row b m-1">
				<div class="col p-3">
					<p class="titulo">{{$vaga->titulo}}</p>
					<p class="w">{{$vaga->nome_empresa}}</p>
					<p class="w"><i>Você se candidatou em: {{ Carbon\Carbon::parse($vaga->canditatura_em)->format('d/m/Y') }} </i></p>

					@if($vaga->visualizado_pela_empresa == 1)
					<p class="w">A empresa visualisou seu perfil</p>
					@endif

					<ul class="p-0" style="/*position: absolute;*/bottom: 0px;list-style: none;">
						<li><a href="{{route('ver-vaga',$vaga->id)}}"> Ver vaga</a></li>
						<li><a href="{{route('deleta-candidatura',$vaga->id)}}">Remover candidatura</a></li>
					</ul>
				</div>
				<div class="col-md-4 p-0 m-0  d-none d-md-block">
					<div class="h-100 w-100">
						<div class="mx-auto w-50">
							<i class="fa fa-share g mt-2"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach

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

