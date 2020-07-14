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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@stop

@section('titulo')
<title>{!!$procurar_vaga->title!!}</title>
@stop

@section('conteudo')
@include('site.includes.menu')
<main role="main">
	<section class="jumbotron text-center parallax" style="background-image: url({{ Voyager::image( $fundo_vaga->imagem) }});">

		<div  class="container encontre-servico">
			<!-- <h2 class="mb-3">{!!$procurar_vaga->titulo!!}</h2> -->
			<div class="row">
				<div class="col px-5  has-search">
					<span class="fa fa-search form-control-feedback"></span>
					<input id="buscar"  type="text" class="form-control busca mx-auto" placeholder="Pesquise aqui">
					<h5 class="mt-3">Encontre sua <strong>vaga</strong> abaixo</h5>

				</div>
			</div>
		</div>
		<p class="m-0 p-0 text-right d-none d-sm-block" style="color: #fff"><i>{!!$fundo_vaga->titulo!!}</i></p>
	</section>


	<section class="conteudo-pesquisa">
		<div id="filtro" class="">
			<div class="container-fluid" style="background-color: #eeeeeeb3;">
				<div class="row">
					<div class="col-md-2">
						<h5 id="encontramos" class="text-center mt-2 mt-sm-5">Carregando...</h5>
					</div>

					<div class="col-md-2 text-center">
						<p class="form-check-label mt-2 mt-sm-4 mb-2" for="inlineCheckbox1"><b>Onde?</b>
						</p>
						<input type="text" class="form-control" placeholder="Procure por cidade ou bairro" id="local" name="local">
						<div class="form-check-inline  d-sm-none">
							<label class="form-check-label">
								<input id="filtrar" type="checkbox" class="form-check-input my-3" value=""> <strong>Deseja filtrar a busca?</strong> 
							</label>
						</div>
					</div>

					<div class="col-md-8 mt-2 table-responsive">
						<!-- desktop -->
						<div class="d-none d-sm-block filtro">
							<div class="row py-3" style="line-height: 67px;">
								<span style=""><b>Estou procurando:</b></span>
								<div class="form-check form-check-inline col">
									<ul>
										<li><input class="form-check-input" type="checkbox" name="regime[]" id="inlineCheckbox1" value="fixo">
											<label class="form-check-label"  for="inlineCheckbox1">Fixo</label>
										</li>
										<li>
											<input class="form-check-input" name="regime[]" type="checkbox" id="inlineCheckbox1" value="temporario">
											<label class="form-check-label" for="inlineCheckbox1">Temporario</label>
										</li>
									</ul>
								</div>
							</div>


							<div class="row py-3">
								<td>
									<b>Onde você quer trabalhar?</b>
								</td>
								<div class="form-check form-check-inline col-md-6 pb-3">

									<ul class="flex-container">

										@foreach($segmentos as $segmento)
										<li class="pb-3">
											<input class="form-check-input" name="area[]" type="checkbox" id="inlineCheckbox1" value="{{$segmento->id}}">
											<label class="form-check-label" for="inlineCheckbox1">{{$segmento->segmento}}</label>
										</li>
										@endforeach
									</ul>
								</div>
							</div>
						</div>



						<!-- mobile -->
						<div class="table pl-2 d-sm-none filtro" style="display: none" id="filtro-mobile">
							<div class="row py-3" style="line-height: 15px;">
								<span style=""><b>Estou procurando:</b></span>
								<div class="form-check form-check-inline col">
									<ul>
										<li><input class="form-check-input" type="checkbox" name="regime[]" id="inlineCheckbox1" value="fixo">
											<label class="form-check-label text-center"  for="inlineCheckbox1">Fixo</label>
										</li>
										<li>
											<input class="form-check-input  text-cente" name="regime[]" type="checkbox" id="inlineCheckbox1" value="temporario">
											<label class="form-check-label" for="inlineCheckbox1">Temporario</label>
										</li>
									</ul>
								</div>
							</div>


							<div class="row py-3">
								<td>
									<b>Onde você quer trabalhar?</b>
								</td>
								<div class="form-check form-check-inline col-md-6 pb-3 pt-3">
									<ul class="flex-container">
										@foreach($segmentos as $segmento)
										<li class="pb-3">
											<input class="form-check-input" name="area[]" type="checkbox" id="inlineCheckbox1" value="{{$segmento->id}}">
											<label class="form-check-label" for="inlineCheckbox1">{{$segmento->segmento}}</label>
										</li>
										@endforeach
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2 d-none d-sm-block" style="padding-top: 100px">
						<div class=" w-100 sticky-top">
							<p class="p-5 my-5"><!-- Publicidade aqui --></p>
						</div>
					</div>

					<div class="col-md-6 col-sm-12 vagas">

						@foreach($vagas as $vaga)

						<a href="/vaga/{{$vaga->id}}">
							<div class="row text-center py-3" style="border-bottom: 1px solid #bdbdbd">
								<div class="col d-none d-sm-block"><img width="125px" src="storage/{{$vaga->logo}}">  
								</div>

								<div class="col">
									<p><b>{{$vaga->titulo}}</b></p>
									<p>{{$vaga->nome_empresa}}</p>  
								</div>

								<div class="col">
									<p><b>{{$vaga->contratacao}}</b></p>
									<p>{{$vaga->localidade}}</p> 
								</div>

								<div class="col mt-4">
									@if($vaga->vaga_em_destaque == "on")
									<p class="vaga-destaque">Destaque</p>
									@else
									<p> Divulgada em {{ Carbon\Carbon::parse($vaga->data_de_criacao)->format('d/m/Y')}}</p>
									@endif
								</div>
							</div>
						</a>
						@endforeach

					</div>


					<!-- <div class="col-md-4 d-none d-sm-block" style="padding-top: 100px"> -->
						<div class="col-md-4" style="padding-top: 100px">
							<div class="w-100  sticky-top">
								<p class="p-5 my-5"><!-- Publicidade aqui --></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	@stop





	@section('js')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="{{asset('js/slick.js')}}"></script>
	<script src="{{asset('js/lista-vagas.js')}}"></script>
	@stop

