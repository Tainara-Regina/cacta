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
@stop


@section('titulo')
<title>Cacta Vagas - Vagas</title>
@stop


@section('conteudo')
	@include('site.includes.menu')
	<section class="jumbotron text-center parallax" 
	@if(isset($fundo_vaga->imagem))
	style="background-image: url({{ Voyager::image( $fundo_vaga->imagem) }});
	@endif
	">

	<div  class="container encontre-servico">
		<h2 class="mb-3 py-2">{{$vaga->titulo}} - {{$vaga->nome_empresa}}</h2>
	</div>
	<p class="m-0 p-0 text-right d-none d-sm-block" style="color: #fff"><i>
		@if(isset($fundo_vaga->imagem))
		{!!$fundo_vaga->titulo!!}
		@endif
	</i></p>
</section>

<div class="container">
	<section class="p-3 voltar">
		<a href="{{ URL::previous() }}"><i class="fa fa-reply"></i> VOLTAR </a>
	</section>
</div>

<section class="d-sm-none vaga">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs mt-3" role="tablist">
		<li class="nav-item">
			<a style="color: rgba(0,0,0,.5);" class="nav-link active" data-toggle="tab" href="#home">DETALHES DA VAGA</a>
		</li>
		<li class="nav-item">
			<a style="color: rgba(0,0,0,.5);" class="nav-link" data-toggle="tab" href="#menu1">SOBRE A EMPRESA</a>
		</li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div id="home" class="container tab-pane active"><br>

			<div class="row">
				<div class="col-12">
					<h1 class="name titulo">{{$vaga->titulo}}
					</h1>
					<p class="address">
						{{$vaga->logradouro}}, {{$vaga->numero}}, - {{$vaga->bairro}} , {{$vaga->uf}}
					</p>
				</div>
			</div>
			
			<div class="row  mb-5">
				<div class="col">
					<p><b>faixa salarial</b></p>
					@if($vaga->faixa_salarial_de == false || $vaga->faixa_salarial_ate == false )
					<p>NÃO DIVULGADA</p>
					@else
					<p>De ${{$vaga->faixa_salarial_de}} até ${{$vaga->faixa_salarial_ate}}</p>
					@endif
				</div>

				<div class="col">
					<p><b>Contratação</b></p>
					<p>{{$vaga->contratacao}}</p>
				</div>

				<div class="col">
					<p><b>Vagas</b></p>
					<p>{{$vaga->quantidade_vaga}}</p>
				</div>
			</div>


			<div class="row">
				<div class="col-12">
					
					<div class="w-100">
						<h2 class="titulo">Descrição</h2>
						<p>{{$vaga->descricao}}</p>
					</div>

					<div class="w-100">
						<h2 class="titulo">Requisitos</h2>
						<p>	{{$vaga->requisitos}} </p>
					</div>

					<div class="w-100">
						<h2 class="titulo">Desejável</h2>
						<p>{{$vaga->desejavel}} </p>
					</div>

					<div class="w-100">
						<h2 class="titulo">Benefícios</h2>
						<p>{{ isset($vaga->beneficios) ? $vaga->beneficios : '' }}
						</p>
					</div>

					<div class="w-100  py-5">


						@if($id_candidato)
						@if($candidatou_se == "não")
						<p class="m-0 p-0">Se identificou com a vaga?</p>

						<a class="btn  btn-success btn-vaga" id="vaga"  href="{{route('candidatar-se',['id' => $vaga->id])}}">Candidate-se</a>
						@else
						<p>Você já se candidatou para esta vaga. <a href="{{route('minhas-vagas')}}">Clique aqui para visualizar suas cadidaturas.</a></p>
						@endif


						@else


						@if($candidatou_se == "não")
						<a class="btn btn-success btn-vaga" id="vaga" data-toggle="modal" data-target="#modalCandidato" href="{{route('candidatar-se',['id' => $vaga->id])}}">Candidate-se</a>
						@else
						<p>Você já se candidatou para esta vaga. <a href="{{route('minhas-vagas')}}">Clique aqui para visualizar suas cadidaturas.</a></p>
						@endif
						@endif
						

						@if($total_cadidaturas == 1)
						<p class="m-0 p-0">{{$total_cadidaturas}} pessoa se candidatou</p>
						@elseif($total_cadidaturas == 0)
						<p class="m-0 p-0">Nenhuma pessoa se candidatou ainda, seja o primeiro e aumente sua chance!</p>
						@else
						<p class="m-0 p-0">{{$total_cadidaturas}} pessoas se candidataram</p>
						@endif
					</div>
				</div>
			</div>

		</div>

		<div id="menu1" class="container tab-pane fade"><br>
			<div class="col-12">
				<!-- <div class="w-100">
					<button type="button" class="btn btn-primary">comapartilhar no facebook</button>
					<button type="button" class="btn btn-secondary">compartilhar no whatsapp</button>
					<button type="button" class="btn btn-success">Enviar por email</button>
				</div> -->

				<div class="w-50 text-center">
					<img class="img-responsive py-2" width="200" height="200" src="/storage/{{$vaga->logo}}">
				</div>

				<div class="w-100">
					<h4 class="titulo">{{$vaga->nome_empresa}}</h4>

					<div>{{$vaga->sobre}}</div>
				</div>

				<div class="w-100 mt-3">
					<h4 class="titulo">Redes sociais</h4>
					<ul class="pl-0" style="list-style-type: none;font-size: 30px;">
						<li style="display: inline-block;"><a class="nav-link" href="https://www.instagram.com/{{$vaga->instagram}}"><i style="color: rgba(0,0,0,.5);" class="fa fa-instagram"></i></a></li>
						<li style="display: inline-block;"><a class="nav-link" href="https://pt-br.facebook.com/{{$vaga->facebook}}"><i style="color: rgba(0,0,0,.5);" class="fa fa-facebook"></i></a></li>
						<li style="display: inline-block;"><a class="nav-link" href="https://twitter.com/{{$vaga->twitter}}"><i style="color: rgba(0,0,0,.5);" class="fa fa-twitter"></i></a></li>
					</ul>
				</div>

				<div class="w-100 mt-3">
					<h4 class="titulo">Onde?</h4>
					<p>
						<a style="color: rgba(0,0,0,.5);" target="_blank" href="https://www.google.com/maps/dir/?api=1&amp;origin=&amp;destination={{$vaga->logradouro}}, {{$vaga->numero}}, - {{$vaga->bairro}} , {{$vaga->uf}}&amp;travelmode=transit"> {{$vaga->logradouro}}, {{$vaga->numero}}, - {{$vaga->bairro}} , {{$vaga->uf}}</a>
					</p>
				</div>

				<div class="w-100">
					<p class="p-5 my-5"><!-- Publicidade aqui --></p>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="d-none d-sm-block vaga">
	<div class="container">
		<div class="row pt-5">
			<div class="col-8">
				<h1 class="titulo">{{$vaga->titulo}}
				</h1>
				<p class="address">
					<span style="font-size: 20px; font-weight: bold"> {{$vaga->nome_empresa}}</span> | {{$vaga->logradouro}}, {{$vaga->numero}}, - {{$vaga->bairro}} , {{$vaga->uf}}
				</p>


				<div class="row">
					<div class="col">
						<p><b>Faixa salarial</b></p>
						@if($vaga->faixa_salarial_de == false || $vaga->faixa_salarial_ate == false )
						<p>NÃO DIVULGADA</p>
						@else
						<p>De ${{$vaga->faixa_salarial_de}} até ${{$vaga->faixa_salarial_ate}}</p>
						@endif
					</div>

					<div class="col">
						<p><b>Contratação</b></p>
						<p>{{$vaga->contratacao}}</p>
					</div>

					<div class="col">
						<p><b>Vagas</b></p>
						<p>{{$vaga->quantidade_vaga}}</p>
					</div>
				</div>


				<div class="row">
					<div class="col">
						<div class="w-75">
							<p class="p-5 my-3"><!-- Publicidade aquiii --></p>
						</div>
					</div>
				</div>




				<div class="w-100">
					<h2 class="titulo">Descrição</h2>
					<p>{{$vaga->descricao}}</p>
				</div>

				<div class="w-100">
					<h2 class="titulo">Requisitos</h2>
					<p>{{$vaga->requisitos}}</p>
				</div>

				<div class="w-100">
					<h2 class="titulo">Desejável</h2>
					<p>{{$vaga->desejavel}}</p>
				</div>

				<div class="w-100">
					<h2 class="titulo">Benefícios</h2>
					<p>{{$vaga->beneficios}}
					</p>
				</div>

				<div class="w-100  py-5">
					

					@if($id_candidato)
					@if($candidatou_se == "não")
					<p class="m-0 p-0">Se identificou com a vaga?</p>

					<a class="btn  btn-success btn-vaga" id="vaga"  href="{{route('candidatar-se',['id' => $vaga->id])}}">Candidate-se</a>
					@else
					<p>Você já se candidatou para esta vaga. <a href="{{route('minhas-vagas')}}">Clique aqui para visualizar suas cadidaturas.</a></p>
					@endif


					@else


					@if($candidatou_se == "não")
					<a class="btn btn-success btn-vaga" id="vaga" data-toggle="modal" data-target="#modalCandidato" href="{{route('candidatar-se',['id' => $vaga->id])}}">Candidate-se</a>
					@else
					<p>Você já se candidatou para esta vaga. <a href="{{route('minhas-vagas')}}">Clique aqui para visualizar suas cadidaturas.</a></p>
					@endif
					@endif


					@if($total_cadidaturas == 1)
					<p class="m-0 p-0">{{$total_cadidaturas}} pessoa se candidatou</p>
					@elseif($total_cadidaturas == 0)
					<p class="m-0 p-0">Nenhuma pessoa se candidatou ainda, seja o primeiro e aumente sua chance!</p>
					@else
					<p class="m-0 p-0">{{$total_cadidaturas}} pessoas se candidataram</p>
					@endif
				</div>
			</div>

			<div class="col-4">
				<!-- <div class="w-100">
					<button type="button" class="btn btn-primary">comapartilhar no facebook</button>
					<button type="button" class="btn btn-secondary">compartilhar no whatsapp</button>
					<button type="button" class="btn btn-success">Enviar por email</button>
				</div> -->

				<div class="w-50 text-center">
					<img class="img-responsive py-2" width="200" height="200" src="/storage/{{$vaga->logo}}">
				</div>

				<div class="w-100">
					<h4 class="titulo mt-3">{{$vaga->nome_empresa}}</h4>

					<div>{{$vaga->sobre}}</div>
					
				</div>

				<div class="w-100 mt-3">
					<h4 class="titulo">Redes sociais</h4>
					<ul class="pl-0" style="list-style-type: none;font-size: 30px;">
						<li style="display: inline-block;"><a class="nav-link" href="https://www.instagram.com/{{$vaga->instagram}}"><i style="color: rgba(0,0,0,.5);" class="fa fa-instagram"></i></a></li>
						<li style="display: inline-block;"><a class="nav-link" href="https://pt-br.facebook.com/{{$vaga->facebook}}"><i style="color: rgba(0,0,0,.5);" class="fa fa-facebook"></i></a></li>
						<li style="display: inline-block;"><a class="nav-link" href="https://twitter.com/{{$vaga->twitter}}"><i style="color: rgba(0,0,0,.5);" class="fa fa-twitter"></i></a></li>
					</ul>
				</div>


				<div class="w-100 mt-3">
					<h4 class="titulo">Onde?</h4>
					<p>
						<a style="color: rgba(0,0,0,.5);"  target="_blank" href="https://www.google.com/maps/dir/?api=1&amp;origin=&amp;destination={{$vaga->logradouro}}, {{$vaga->numero}}, - {{$vaga->bairro}} , {{$vaga->uf}}&amp;travelmode=transit"> {{$vaga->logradouro}}, {{$vaga->numero}}, - {{$vaga->bairro}} , {{$vaga->uf}}</a>
					</p>
				</div>

				<div class="w-100">
					<p class="p-5 my-5"><!-- Publicidade aqui --></p>
				</div>
			</div>	
		</div>
	</div>
</section>


@include('site.includes.rodape')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{asset('js/slick.js')}}"></script>
<script src="{{asset('js/home.js')}}"></script>

<script type="text/javascript">
	$(document).ready(function(){

		$(".btn-vaga").click(function(){

			var url_atual = window.location.href;

			var id_vaga = url_atual.split("/");	

			$("#vaga_candidato").val(id_vaga[4]);
			
		});
	});
</script>
@stop
