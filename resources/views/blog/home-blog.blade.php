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
</head>


<body>

	@include('blog.includes.menu-blog-mobile')
	@include('blog.includes.menu-blog')
	
	
	<section class="mb-5 pb-5" style="background-color: #000;" >
		<div class="container">
			<div class="row" style="color: #fff">
				<div class="col-md-8 mt-4 ">
					<h2>Blog Cacta </h2>
					<h4>Evoluindo com o "pequeno GRANDE" emprendedor.</h4>
					<p><i>"Pensamos sempre em soluções para ajudar no sucesso do pequeno empreendedor.<br> Vamos juntos?" </i>👊 <br><span>- Cacta</span></p>

				</div>

				<div class="col mt-5 mb-3">
					<i> <span class="text-center staticText" id = "staticText" >"Ser empreendedor é <span style="color: green" id="typeline" ></span>"</span></i> <br>
					-<span class="cacta"> Cacta</span>
				</div>
			</div>


			<!-- <div class="row">
				<div class="col" style="color: #fff">
					<div class="col w pb-5">
						<i> <span class="text-center staticText" id = "staticText" >"Ser empreendedor é <span style="color: green" id="typeline" ></span>"</span></i> <br>
						-<span class="cacta"> Cacta</span>
					</div>
				</div>
			</div> -->

			<div class="row">
				
				<div  class="col-md-4 mb-2 text-center">
					<div class="h-100  p-3" style="background-color: #fff;border-radius: 20px;box-shadow: 15px 11px 16px -8px rgba(0,0,0,0.25);">
						<p><b>Calculadora do barbeiro</b></p>
						<p>Fazer os calculos do seu lucro nunca foi tão fácil. Criamos uma calculadora para facilitar sua vida na hora de somar seus lucros.</p>
						<button type="button" class="btn btn-warning">CONHECER</button>
					</div>
				</div>



				<div  class="col-md-4 mb-2 text-center">
					<div class="h-100  p-3" style="background-color: #fff;border-radius: 20px;box-shadow: 15px 11px 16px -8px rgba(0,0,0,0.25);">
						<p><b>App para encontrar uma vaga de emprego</b></p>
						<p>Está procurando uma vaga de emprego? Conheça nosso novo App e encontre<br> "aquela vaga". O App também oferece outras ferramentas importantes.</p>
						<button type="button" class="btn btn-warning">CONHECER</button>
					</div>
				</div>



				<div class="col-md-4 mb-2 text-center">
					<div class="h-100  p-3" style="background-color: #fff;border-radius: 20px;box-shadow: 15px 11px 16px -8px rgba(0,0,0,0.25);">
						<p><b>Para você ter a melhor equipe</b></p>
						<p>Contrate as pessoas certas para sua equipe no Cacta Vagas</p>
						<button type="button" class="btn btn-warning">CONHECER</button>
					</div>
				</div>

			</div>
		</div>
	</section>



	<div class="container">
		<div class="row">
			<div  class="col-md-8">
				<a href="{{route('post',$ultimo_post->slug)}}">
					<img style="height: 300px;width: 100%" class="img-fluid" src="{{Voyager::image($ultimo_post->image)}}">

					<h3 class="my-3" style="color: #754026">{{$ultimo_post->title}}</h3>

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
					<hr>
				</a>
			</div>








			<div class="col-md-4">
				<h2 style="color: #754026">Mais visualizados</h2>

				@foreach($mais_visualizados as $ultimo_post)
				<a href="{{route('post',$ultimo_post->slug)}}">
					<div class="row m-0 mb-3 p-0">
						<div class="col-5 m-0 p-0">
							<img style="height: 100px;width: 120px"class="img-fluid img-thumbnail" src="{{Voyager::image($ultimo_post->image)}}">
						</div>

						<div class="col m-0 p-0 pt-3">
							<p style="color: #754026;font-weight: 700;">{{$ultimo_post->title}}</p>
						</div>
					</div>
				</a>
				@endforeach

			</div>
		</div>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-md-8">

				@foreach($ultimos_posts as $ultimo_post)
				<a href="{{route('post',$ultimo_post->slug)}}">
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
					{!! $ultimos_posts->links()!!}
				</div>
				

			</div>



			<div class="col-md-4">
				<div class="w-100" style="background-color: red;height: 200px">
					<p>Propaganda aqui</p>
				</div>
			</div>

		</div>
	</div>



	@include('site.includes.rodape')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="{{asset('js/slick.js')}}"></script>
	<script src="{{asset('js/home.js')}}"></script>
	<script type="text/javascript" src="{{asset('/js/admin/adminContratante/home-admin.js')}}"></script>

</body>
</html>




