@extends('blog.base')


	@section('titulo')
<title>Cacta Vagas Blog - Tudo para o empreendedor. Marketing digital, empreendedorismo, e muito mais.</title>
@stop

@section('css')
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
	<style type="text/css">
		*{
			font-family: 'Kulim Park', sans-serif;
		}

		a{
			color: #555;
		}

		a:hover{
			color: green;
		}

	</style>
	@stop



@section('conteudo')
	<section style="background-color: #000;" >
		<div class="container">
			<div class="row" style="color: #fff">
				<div class="col-md-8  text-center">
					
					
					
				</div>

				<div class="col mt-3">
					<i> <span class="text-center staticText" id = "staticText" >"Ser empreendedor é <span style="color: green" id="typeline" ></span>"</span></i> <br>
					-<span class="cacta"> Cacta</span>
				</div>
			</div>


			<div class="row">
				<div class="col" style="color: #fff">
					<div class="col mb-5 w text-center">
						
						<h2>{{$title->name}}</h2>
						
					</div>
				</div>
			</div>

		</div>
	</section>




	<div class="container">

		<div class="row mt-5">
			<div class="col-md-8">
				@foreach($posts as $ultimo_post)
				<a href="{{route('post',$ultimo_post->slug_post)}}">
					<div style="    border-bottom: 1px solid grey;" class="row m-0 mb-3 pb-3">
						<div class="col-4 m-0 p-0">
							<img class="img-fluid img-thumbnail" src="{{Voyager::image($ultimo_post->image)}}">
						</div>

						<div class="col m-0 p-0 pl-3">
							<p  style="font-weight: 700;color: #754026;">{{$ultimo_post->title}}</p>

							<p>
								{{$ultimo_post->excerpt}}
							</p>

							@if($ultimo_post->created_at == $ultimo_post->updated_at)
							<p>
								{{ Carbon\Carbon::parse($ultimo_post->created_at)->format('d/m/Y H:i:s')}}
							</p>
							@else
							<p>
								{{ Carbon\Carbon::parse($ultimo_post->created_at)->format('d/m/Y H:i:s')}} | atualizado em {{ Carbon\Carbon::parse($ultimo_post->updated_at)->format('d/m/Y H:i:s')}}
							</p>
							@endif

						</div>
						<hr>
					</div>
				</a>
				@endforeach
				<div>
					{!! $posts->links()!!}
				</div>
			</div>


			<div class="col-md-4">
				<div class="w-100" style="height: 200px">
					<!-- anuncio -->
				</div>
			</div>

		</div>
	</div>
@stop


	@section('rodape')
	@include('site.includes.rodape')
	@stop

		@section('js')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="{{asset('js/slick.js')}}"></script>
	<script src="{{asset('js/home.js')}}"></script>
	<script type="text/javascript" src="{{asset('/js/admin/adminContratante/home-admin.js')}}"></script>
	@stop




