@extends('blog.base')

@section('titulo')
<title>Cacta vagas | Cacta Vagas Blog - Tudo para o empreendedor. Marketing digital, empreendedorismo, e muito mais.</title>
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
<section class="mb-5 pb-5" style="background-color: #000;" >
	<div class="container">
		<div class="row" style="color: #fff">
			<div class="col-md-8 mt-4 ">
				<h2>Cacta Vagas Blog </h2>
				<h4>Evoluindo com o "pequeno GRANDE" emprendedor.</h4>
				<p><i>"Pensamos sempre em soluções para ajudar no sucesso do pequeno empreendedor.<br> Vamos juntos?" </i>👊 <br><span>- Cacta</span></p>

			</div>

			<div class="col mt-5 mb-3">
				<i> <span class="text-center staticText" id = "staticText" >"Ser empreendedor é <span style="color: green" id="typeline" ></span>"</span></i> <br>
				-<span class="cacta"> Cacta</span>
			</div>
		</div>



		<!-- Cards aqui -->


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
			<h2 style="color: #754026" class="my-3">Mais visualizados</h2>

			@foreach($mais_visualizados as $ultimo_post)
			<a href="{{route('post',$ultimo_post->slug)}}">
				<div style="border-bottom: 1px solid grey;" class="row m-0 mb-3 p-0">
					<div class="col-5 m-0 p-0">
						<img style="height: 100px;width: 120px"class="img-fluid img-thumbnail" src="{{Voyager::image($ultimo_post->image)}}">
					</div>

					<div class="col m-0 p-0 pt-3">
						<p style="color: #754026;font-weight: 700;">{{$ultimo_post->title}}</p>


						<p>
							{{mb_strimwidth($ultimo_post->excerpt, 0, 70, "...")}}
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
				</div>
			</a>
			@endforeach

		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h2 style="color: #754026" class="my-3">Últimos Posts</h2>
			@foreach($ultimos_posts as $ultimo_post)
			<a href="{{route('post',$ultimo_post->slug)}}">
				<div style="    border-bottom: 1px solid grey;" class="row m-0 mb-3 pb-3">
					<div class="col-4 m-0 p-0">
						<img class="img-fluid img-thumbnail" src="{{Voyager::image($ultimo_post->image)}}">
					</div>

					<div class="col m-0 p-0 pl-3">
						<p  style="font-weight: 700;color: #754026;">{{$ultimo_post->title}}</p>

						<p>
							{{mb_strimwidth($ultimo_post->excerpt, 0, 70, "...")}}
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
			<div class="w-100" style="height: 200px">
				<!-- anuncio -->
			</div>
		</div>

	</div>


	<div class="row">
		<div class="col">
			<h2 style="font-weight: 700;color: #754026;">Importancia do Marketing</h2>
			<p>É impossível ampliar um negócio se ele está fora da internet.</p>


			<p>Como estudado no capítulo,vimos algumas estratégias existentes(inbound marketing,SEO,branding marketing,etc.),mas quem deve decidir quais serão utilizadas é quem está "gerenciando a campanha".</p>

			<p>Converter clientes com o marketing digital tem o custo bem menor do que com o marketing tradicional, e com uma estratégia bem definida o sucesso é quase que garantido,pois no decorrer da campanha,a estratégia pode ser alterada para trazer melhores resultados de acordo com o objetivo pretendo.</p>
		</div>
	</div>




	<div class="row">
		<div class="col">
			<h2 style="font-weight: 700;color: #754026;">Cultura e subcultura no comportamento do consumidor</h2>

			<p>A cultura é determinada pelo local que vivemos, situações que passamos e tudo que esta a nossa volta. Ela molda nossa forma de pensar e agir.</p>

			<p>Quando falamos de cultura estamos falando de forma ampla.</p>

			<p>As subcultura podem ser consideradas grupos “dentro da cultura”.
			Estudar a cultura e subcultura ajuda a entender as tendências dos consumidores, e sua forma de pensar. Isto é muito mais valioso do que dados superficiais como região, idade, sexo,etc.</p>
		</div>
	</div>



	<div class="row">
		<div class="col">
			<h2 style="font-weight: 700;color: #754026;">Equipes de alto desempenho</h2>
			<p>O fato dela permitir ter colaboradores preparados para diversas situações e não somente aquela que ele está acostumado a enfrentar. </p>
			<p>Isto é possível por conta do estimulo de compartilhamento  das competências de cada individuo da equipe.</p>
			<p>Ema característica também interessante é a capacidade de ter equipes altamente motivadas,que colaboram com a harmonia e transparência entre os demais colaboradores. Logo,a eficiência é conquistada,com colaboradores flexíveis, e com isso a redução de custos.</p>
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


