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
	<section class="jumbotron text-center parallax" style="background-image: url({{ Voyager::image( $fundo_vaga->imagem) }});">

		<div  class="container encontre-servico">
			<h2 class="mb-3 py-5">Fringilla semper</h2>
		</div>
		<p class="m-0 p-0 text-right d-none d-sm-block" style="color: #fff"><i>{!!$fundo_vaga->titulo!!}</i></p>
	</section>


	
	
	<div class="container">
		<section class="p-3 voltar">
		<a href="{{ URL::previous() }}"><i class="fa fa-reply"></i> VOLTAR PARA VAGAS</a>
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
					<h1 class="name titulo">SP dictum adipiscing tellus / auctor dui
					</h1>
					<p class="address">
						Lorem ipsum mauris | Lorem ipsum mauris  - Lorem ipsum mauris , SP
					</p>


					<div class="w-100">
						<h2 class="titulo">Descrição</h2>
						<p>Lorem ipsum mauris adipiscing ipsum eu vitae ante, dictum adipiscing tellus vel est pellentesque sodales, augue at inceptos sapien cras massa. velit aliquam nullam nulla tempor taciti scelerisque taciti porta nisi blandit risus, auctor dui class nullam odio donec consequat aptent augue conubia porta lacus, eros ad metus convallis aptent rhoncus erat etiam sollicitudin auctor. consectetur non enim vivamus diam non semper tellus diam, bibendum faucibus litora pharetra ultricies senectus iaculis arcu per, luctus condimentum ad malesuada tortor condimentum leo. viverra varius velit scelerisque sagittis sed dictumst quis massa felis torquent tempus tristique tincidunt sem, et blandit sem ut porta eros iaculis quis bibendum tellus dolor consectetur. </p>
					</div>

					<div class="w-100">
						<h2 class="titulo">Requisitos</h2>
						<p>	Fringilla semper fames metus vestibulum faucibus euismod erat sollicitudin, consequat elementum mi ultrices taciti donec vulputate rhoncus nec, urna semper pharetra habitant aliquam felis dictum. porttitor magna vivamus odio habitant vivamus sollicitudin vestibulum cras torquent posuere justo suscipit aliquam platea egestas nisi, eros eget dictumst taciti etiam lobortis eleifend commodo magna nisl maecenas ullamcorper elementum venenatis erat. pellentesque augue ut a dictum conubia curabitur eu ullamcorper justo mattis auctor, sagittis donec mi sapien sociosqu sodales fusce vel a habitasse inceptos duis, nisl donec nostra rhoncus ligula egestas sollicitudin dictum massa blandit. </p>
					</div>

					<div class="w-100">
						<h2 class="titulo">Desejavel</h2>
						<p>Libero egestas faucibus vitae sollicitudin turpis aliquam, erat fermentum molestie vehicula ornare fringilla taciti, donec in urna conubia interdum. aenean ac netus cras litora fusce torquent est leo rutrum, class praesent consectetur ipsum senectus lacus quisque. convallis odio donec amet faucibus nostra urna, sem ad diam tortor ad conubia, lobortis eget eros ultricies metus. class elit per inceptos integer eu suscipit, curabitur habitant urna lacinia condimentum aenean, aptent aliquam imperdiet est volutpat. cubilia tortor turpis orci blandit primis libero ornare dolor semper luctus, lectus sodales praesent et ut auctor massa euismod. </p>
					</div>

					<div class="w-100 bg-secondary ">
						<h2 class="titulo">Beneficios</h2>
						<p>	Magna in habitasse quam augue erat purus etiam pellentesque dictumst, dolor pharetra primis sem consectetur ligula lectus mi, donec pretium vestibulum mollis sed pharetra taciti malesuada. lorem tempor consequat nostra ornare cubilia in nam litora netus in, dui sodales habitant habitasse quisque ipsum volutpat purus morbi scelerisque, posuere nec sollicitudin quis accumsan velit rutrum fringilla mollis. neque ligula quam placerat curabitur etiam curae potenti, ligula inceptos congue quis ligula augue, quisque rutrum convallis porttitor non posuere. mauris conubia dictum bibendum eget cursus lobortis aliquam, sit sem eu urna quisque orci lectus, diam eget sodales habitasse tempor ante. 
						</p>
					</div>

					<div class="w-100  py-5">
						<p  class="m-0 p-0">Se identificou com a vaga?</p>
						<button type="button" class="btn btn-primary">Candidate-se</button>
						<p  class="m-0 p-0">13 pessoas se candidataram</p>
					</div>
				</div>
			</div>


			<div id="menu1" class="container tab-pane fade"><br>
				<div class="col-12">
					<div class="w-100">
						<button type="button" class="btn btn-primary">Primary</button>
						<button type="button" class="btn btn-secondary">Secondary</button>
						<button type="button" class="btn btn-success">Success</button>
					</div>

					<div class="w-50 bg-success">
						<p class="p-5 my-5">Imagem do logo da empresa aqui</p>
					</div>

					<div class="w-100">
						<h4 class="titulo">Fringilla semper</h4>

						<p>
							<div>lorem tempor consequat nostra ornare cubilia in nam litora netus in, dui sodales habitant habitasse<br>
								<br>
								olutpat purus morbi scelerisque:<br>
								<br>
								- posuere nec sollicitudin <br>
								- posuere nec sollicitudin<br>
								- posuere nec sollicitudin<br>
								- posuere nec sollicitudin<br>
								- posuere nec sollicitudin<br>
								- posuere nec sollicitudin<br>
								<br>
								bibendum eget cursus lobortis aliquam.
							</div>
						</p>
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
							<a target="_blank" href="link do google  maps aqui"> lobortis eleifend commodo magna nisl maecenas ullamcorper elementum - São Paulo, SP</a>
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
					<h1 class="titulo">SP dictum adipiscing tellus / auctor dui
					</h1>
					<p class="address">
						Lorem ipsum mauris | Lorem ipsum mauris  - Lorem ipsum mauris , SP
					</p>


					<div class="w-100">
						<h2 class="titulo">Descrição</h2>
						<p>Lorem ipsum mauris adipiscing ipsum eu vitae ante, dictum adipiscing tellus vel est pellentesque sodales, augue at inceptos sapien cras massa. velit aliquam nullam nulla tempor taciti scelerisque taciti porta nisi blandit risus, auctor dui class nullam odio donec consequat aptent augue conubia porta lacus, eros ad metus convallis aptent rhoncus erat etiam sollicitudin auctor. consectetur non enim vivamus diam non semper tellus diam, bibendum faucibus litora pharetra ultricies senectus iaculis arcu per, luctus condimentum ad malesuada tortor condimentum leo. viverra varius velit scelerisque sagittis sed dictumst quis massa felis torquent tempus tristique tincidunt sem, et blandit sem ut porta eros iaculis quis bibendum tellus dolor consectetur. </p>
					</div>

					<div class="w-100">
						<h2 class="titulo">Requisitos</h2>
						<p>	Fringilla semper fames metus vestibulum faucibus euismod erat sollicitudin, consequat elementum mi ultrices taciti donec vulputate rhoncus nec, urna semper pharetra habitant aliquam felis dictum. porttitor magna vivamus odio habitant vivamus sollicitudin vestibulum cras torquent posuere justo suscipit aliquam platea egestas nisi, eros eget dictumst taciti etiam lobortis eleifend commodo magna nisl maecenas ullamcorper elementum venenatis erat. pellentesque augue ut a dictum conubia curabitur eu ullamcorper justo mattis auctor, sagittis donec mi sapien sociosqu sodales fusce vel a habitasse inceptos duis, nisl donec nostra rhoncus ligula egestas sollicitudin dictum massa blandit. </p>
					</div>

					<div class="w-100">
						<h2 class="titulo">Desejavel</h2>
						<p>Libero egestas faucibus vitae sollicitudin turpis aliquam, erat fermentum molestie vehicula ornare fringilla taciti, donec in urna conubia interdum. aenean ac netus cras litora fusce torquent est leo rutrum, class praesent consectetur ipsum senectus lacus quisque. convallis odio donec amet faucibus nostra urna, sem ad diam tortor ad conubia, lobortis eget eros ultricies metus. class elit per inceptos integer eu suscipit, curabitur habitant urna lacinia condimentum aenean, aptent aliquam imperdiet est volutpat. cubilia tortor turpis orci blandit primis libero ornare dolor semper luctus, lectus sodales praesent et ut auctor massa euismod. </p>
					</div>

					<div class="w-100 bg-secondary ">
						<h2 class="titulo">Beneficios</h2>
						<p>	Magna in habitasse quam augue erat purus etiam pellentesque dictumst, dolor pharetra primis sem consectetur ligula lectus mi, donec pretium vestibulum mollis sed pharetra taciti malesuada. lorem tempor consequat nostra ornare cubilia in nam litora netus in, dui sodales habitant habitasse quisque ipsum volutpat purus morbi scelerisque, posuere nec sollicitudin quis accumsan velit rutrum fringilla mollis. neque ligula quam placerat curabitur etiam curae potenti, ligula inceptos congue quis ligula augue, quisque rutrum convallis porttitor non posuere. mauris conubia dictum bibendum eget cursus lobortis aliquam, sit sem eu urna quisque orci lectus, diam eget sodales habitasse tempor ante. 
						</p>
					</div>

					<div class="w-100  py-5">
						<p class="m-0 p-0">Se identificou com a vaga?</p>
						<button type="button" class="btn btn-primary">Candidate-se</button>
						<p class="m-0 p-0">13 pessoas se candidataram</p>
					</div>
				</div>

				<div class="col-4">
					<div class="w-100">
						<button type="button" class="btn btn-primary">Primary</button>
						<button type="button" class="btn btn-secondary">Secondary</button>
						<button type="button" class="btn btn-success">Success</button>
					</div>

					<div class="w-50 bg-success">
						<p class="p-5 my-5">Imagem do logo da empresa aqui</p>
					</div>

					<div class="w-100">
						<h4 class="titulo">Fringilla semper</h4>

						<p>
							<div>lorem tempor consequat nostra ornare cubilia in nam litora netus in, dui sodales habitant habitasse<br>
								<br>
								olutpat purus morbi scelerisque:<br>
								<br>
								- posuere nec sollicitudin <br>
								- posuere nec sollicitudin<br>
								- posuere nec sollicitudin<br>
								- posuere nec sollicitudin<br>
								- posuere nec sollicitudin<br>
								- posuere nec sollicitudin<br>
								<br>
								bibendum eget cursus lobortis aliquam.
							</div>
						</p>
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
							<a target="_blank" href="link do google  maps aqui"> lobortis eleifend commodo magna nisl maecenas ullamcorper elementum - São Paulo, SP</a>
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




