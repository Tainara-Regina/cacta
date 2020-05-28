@extends('blog.base')


@section('titulo')
<title>{!!$post->title!!}</title>
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
	<section class="" style="background-color: #000;" >
		<div class="container" style="background-color: #000;" >
			<div class="row">
				<div style="color: #fff" class="col p-5 mt-3  text-center">
					<h1>{{$post->title}}
					</h1>
				</div>
			</div>
			<div class="row">
				<div style="font-size: 12px;color:#fff" class="col text-center" style="border-bottom: 1px solid grey">
					@if($post->created_at == $post->updated_at)
					<p>
						{{ Carbon\Carbon::parse($post->created_at)->format('d/m/Y H:i:s')}}
					</p>
					@else
					<p>
						{{ Carbon\Carbon::parse($post->created_at)->format('d/m/Y H:i:s')}} | atualizado em {{ Carbon\Carbon::parse($post->updated_at)->format('d/m/Y H:i:s')}}
					</p>
					@endif
					<hr>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container" style="background-color: #fff;">
			<div class="row pt-5">
				<div class="col-md-8">
					<section class="voltar">
						<a href="{{route('blog-home')}}"><i class="fa fa-reply"></i> VOLTAR </a>
						<div class="text-center mb-3">
							<img class="img-thumbnail" style="width: 50%;max-height: 367px;" src="{{Voyager::image($post->image)}}">
						</div>
					</section>

					<h2 class="mb-5" style="font-size: 20px">
						<b>{{$post->excerpt}}</b>
					</h2>
					{!!$post->body!!}

				</div>

				<div class="col">
					<div class="w-100" style="height: 200px">
						<!-- anuncio -->
					</div>
					<div class="w-100 mt-5" style="height: 200px">
						<!-- anuncio -->
					</div>
				</div>
			</div>
		</div>
	</section>


	<div class="container-fluid mx-0 mt-5 p-0">
		<div class="row m-0 p-0">
			<div class="col m-0 p-0">
				<h2 class="text-center my-3"> Posts relacionados</h2>
				<section class="blog text-center">
					<div class="slider">
						@foreach($ultimos_posts as $ultimo_post)
						<div class="m-0 p-0" style='height: 338px;background-image: url("{{Voyager::image($ultimo_post->image)}}")'>
							<a target="_blank"   href="{{route('post',$ultimo_post->slug)}}">
								<div class="background" >
								</div>
								<div class="text">
									<span class="category">{{$ultimo_post->name}}</span>
									<h3>
										{{$ultimo_post->title}}
									</h3>
								</div>
							</a>
						</div>
						@endforeach
					</section>
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
@stop
