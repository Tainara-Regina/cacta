<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="cacta">
	<title>Vagas</title>

	<!-- Bootstrap core CSS -->
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
</head>


<body>


	@include('site.includes.menu-mobile')
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
			<a class="nav-link active" data-toggle="tab" href="#home">DETALHES DA VAGA</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#menu1">SOBRE A EMPRESA</a>
		</li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div id="home" class="container tab-pane active"><br>

			<div class="col-12">
				<h1 class="name titulo">{{$vaga->titulo}}
				</h1>
				<p class="address">
					{{$vaga->logradouro}}, {{$vaga->numero}}, - {{$vaga->bairro}} , {{$vaga->uf}}
				</p>


				<div class="w-100">
					<h2 class="titulo">Descrição</h2>
					<p>{{$vaga->descricao}}</p>
				</div>

				<div class="w-100">
					<h2 class="titulo">Requisitos</h2>
					<p>	{{$vaga->requisitos}} </p>
				</div>

				<div class="w-100">
					<h2 class="titulo">Desejavel</h2>
					<p>{{$vaga->desejavel}} </p>
				</div>

				<div class="w-100 bg-secondary ">
					<h2 class="titulo">Beneficios</h2>
					<p>{{$vaga->beneficios}}
					</p>
				</div>

				<div class="w-100  py-5">
					<p  class="m-0 p-0">Se identificou com a vaga?</p>
					<a class="btn btn-primary" href="#">Candidate-se</a>
					<p  class="m-0 p-0">13 pessoas se candidataram</p>
				</div>
			</div>
		</div>


		<div id="menu1" class="container tab-pane fade"><br>
			<div class="col-12">
				<div class="w-100">
					<button type="button" class="btn btn-primary">comapartilhar no facebook</button>
					<button type="button" class="btn btn-secondary">compartilhar no whatsapp</button>
					<button type="button" class="btn btn-success">Enviar por email</button>
				</div>

				<div class="w-50 text-center">
					<img class="img-responsive py-2" width="200" height="200" src="/storage/{{$vaga->logo}}">
				</div>

				<div class="w-100">
					<h4 class="titulo">{{$vaga->nome_empresa}}</h4>

					<div>{{$vaga->sobre}}</div>
				</div>

				<div class="w-100 mt-3">
					<h4 class="titulo">Redes sociais</h4>
					<button type="button" class="btn btn-primary">Primary</button>
					<button type="button" class="btn btn-secondary">Secondary</button>
					<button type="button" class="btn btn-success">Success</button>
				</div>


				<div class="w-100 mt-3">
					<h4 class="titulo">Onde?</h4>
					<p>
						<a target="_blank" href="https://www.google.com/maps/dir/?api=1&amp;origin=&amp;destination={{$vaga->logradouro}}, {{$vaga->numero}}, - {{$vaga->bairro}} , {{$vaga->uf}}&amp;travelmode=transit"> {{$vaga->logradouro}}, {{$vaga->numero}}, - {{$vaga->bairro}} , {{$vaga->uf}}</a>
					</p>
				</div>

				<div class="w-100 bg-danger">
					<p class="p-5 my-5">Publicidade aqui</p>
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
					{{$vaga->logradouro}}, {{$vaga->numero}}, - {{$vaga->bairro}} , {{$vaga->uf}}
				</p>


				<div class="row">
					<div class="col">
						<p>faixa salarial</p>
						<p>NÃO DIVULGADA</p>
					</div>

					<div class="col">
						<p>Contratação</p>
						<p>{{$vaga->contratacao}}</p>
					</div>

					<div class="col">
						<p>Vagas</p>
						<p>{{$vaga->quantidade_vaga}}</p>
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
					<h2 class="titulo">Desejavel</h2>
					<p>{{$vaga->desejavel}}</p>
				</div>

				<div class="w-100 bg-secondary ">
					<h2 class="titulo">Beneficios</h2>
					<p>{{$vaga->beneficios}}
					</p>
				</div>

				<div class="w-100  py-5">
					

					@if($id_candidato)
					@if($candidatou_se == "não")
					<p class="m-0 p-0">Se identificou com a vaga?</p>

					<a class="btn btn-primary"  href="{{route('candidatar-se',['id' => $id_candidato])}}">Candidate-seei</a>
					@else
					<p>Você já se candidatou para esta vaga. <a href="#">Clique aqui para visualizar suas cadidaturas.</a></p>
					@endif


					@else


					@if($candidatou_se == "não")
					<a class="btn btn-primary"  data-toggle="modal" data-target="#modalCandidato" href="{{route('candidatar-se',['id' => $id_candidato])}}">Candidate-seei</a>
					@else
					<p>Você já se candidatou para esta vaga. <a href="#">Clique aqui para visualizar suas cadidaturas.</a></p>
					@endif
					@endif


					@if($total_cadidaturas == 1)
					<p class="m-0 p-0">{{$total_cadidaturas}} pessoas se candidatou</p>
					@else
					<p class="m-0 p-0">{{$total_cadidaturas}} pessoas se candidataram</p>
					@endif
				</div>
			</div>

			<div class="col-4">
				<div class="w-100">
					<button type="button" class="btn btn-primary">comapartilhar no facebook</button>
					<button type="button" class="btn btn-secondary">compartilhar no whatsapp</button>
					<button type="button" class="btn btn-success">Enviar por email</button>
				</div>

				<div class="w-50 text-center">
					<img class="img-responsive py-2" width="200" height="200" src="/storage/{{$vaga->logo}}">
				</div>

				<div class="w-100">
					<h4 class="titulo mt-3">{{$vaga->nome_empresa}}</h4>

					<div>{{$vaga->sobre}}</div>
					
				</div>

				<div class="w-100 mt-3">
					<h4 class="titulo">Redes sociais</h4>
					<button type="button" class="btn btn-primary">Primary</button>
					<button type="button" class="btn btn-secondary">Secondary</button>
					<button type="button" class="btn btn-success">Success</button>
				</div>


				<div class="w-100 mt-3">
					<h4 class="titulo">Onde?</h4>
					<p>
						<a target="_blank" href="https://www.google.com/maps/dir/?api=1&amp;origin=&amp;destination={{$vaga->logradouro}}, {{$vaga->numero}}, - {{$vaga->bairro}} , {{$vaga->uf}}&amp;travelmode=transit"> {{$vaga->logradouro}}, {{$vaga->numero}}, - {{$vaga->bairro}} , {{$vaga->uf}}</a>
					</p>
				</div>

				<div class="w-100 bg-danger">
					<p class="p-5 my-5">Publicidade aqui</p>
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

</body>
</html>




