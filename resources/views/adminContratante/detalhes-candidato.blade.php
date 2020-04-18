<!DOCTYPE html>
<html lang="pt">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Cacta - Admin Vagas</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	crossorigin="anonymous">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('/css/adminContrate/menu-admin.css')}}">
	<link rel="stylesheet" href="{{asset('/css/adminContrate/home-admin.css')}}">


	<!-- botão share -->
	<style type="text/css">
		* {
			font-family: "Roboto", sans-serif;
		}
		body {
			/*background-color: #e5e5e5;*/
		}
		.share	.btn__container {
			/*	height: 100vh;*/
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.share	 .btn {
			min-width: 110px;
			background-color: #fff;
			padding: 1rem 2rem;
			text-decoration: none;
			color: #C71E7E;
			display: flex;
			transition: all 0.2s ease-in-out;
			margin-right: 10px;
		}
		.share	.btn i {
			color: #DF3796;
			font-size: 20px;
			padding-right: 10px;
			transition: all 0.3s ease-in-out;
		}
		.share	.btn span {
			font-family: "Roboto", sans-serif;
			align-self: center;
			transform: translateX(0px);
			transition: all 0.1s ease-in-out;
			opacity: 1;
		}
		.share	.btn:hover {
			transform: scale(1.1);
			background: linear-gradient(to right, #ff3019 0%, #c90477 100%);
			box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
		}
		.share	.btn:hover i {
			transform: translateX(45px);
			padding-right: 0;
			color: #FFF;
		}
		.share		.btn:hover span {
			transform: translateX(30px);
			opacity: 0;
		}
		.share		.btn:active {
			transform: scale(1);
			box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
		}
		.share		.btn-f {
			min-width: 110px;
			background-color: #fff;
			padding: 1rem 2rem;
			text-decoration: none;
			color: #286ED6;
			display: flex;
			transition: all 0.2s ease-in-out;
		}
		.share		.btn-f i {
			color: #286ED6;
			font-size: 20px;
			padding-right: 10px;
			transition: all 0.3s ease-in-out;
		}
		.share		.btn-f span {
			font-family: "Roboto", sans-serif;
			align-self: center;
			transform: translateX(0px);
			transition: all 0.1s ease-in-out;
			opacity: 1;
		}
		.share		.btn-f:hover {
			transform: scale(1.1);
			background-color: #286ED6;
			box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
		}
		.share		.btn-f:hover i {
			transform: translateX(45px);
			padding-right: 0;
			color: #FFF;
		}
		.share	.btn-f:hover span {
			transform: translateX(30px);
			opacity: 0;
		}
		.share		.btn-f:active {
			transform: scale(1);
			box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
		}







		.share		.btn-w {
			min-width: 110px;
			background-color: #fff;
			padding: 1rem 2rem;
			text-decoration: none;
			color: green;
			display: flex;
			transition: all 0.2s ease-in-out;
		}
		.share		.btn-w i {
			color: green;
			font-size: 20px;
			padding-right: 10px;
			transition: all 0.3s ease-in-out;
		}
		.share		.btn-w span {
			font-family: "Roboto", sans-serif;
			align-self: center;
			transform: translateX(0px);
			transition: all 0.1s ease-in-out;
			opacity: 1;
		}
		.share		.btn-w:hover {
			transform: scale(1.1);
			background-color: green;
			box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
		}
		.share		.btn-w:hover i {
			transform: translateX(45px);
			padding-right: 0;
			color: #FFF;
		}
		.share	.btn-w:hover span {
			transform: translateX(30px);
			opacity: 0;
		}
		.share		.btn-w:active {
			transform: scale(1);
			box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
		}























		.share		.btn-s {
			min-width: 110px;
			background-color: #fff;
			padding: 1rem 2rem;
			text-decoration: none;
			color: #757575;
			display: flex;
			transition: all 0.2s ease-in-out;
		}
		.share		.btn-s i {
			color: #757575;
			font-size: 20px;
			padding-right: 10px;
			transition: all 0.3s ease-in-out;
		}
		.share		.btn-s span {
			font-family: "Roboto", sans-serif;
			align-self: center;
			transform: translateX(0px);
			transition: all 0.1s ease-in-out;
			opacity: 1;
		}
		.share		.btn-s:hover {
			transform: scale(1.1);
			background-color: #9e9e9e;
			box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
		}
		.share		.btn-s:hover i {
			transform: translateX(45px);
			padding-right: 0;
			color: #FFF;
		}
		.share	.btn-s:hover span {
			transform: translateX(30px);
			opacity: 0;
		}
		.share		.btn-s:active {
			transform: scale(1);
			box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
		}

	</style>
</head>


<body>
	<div class="page-wrapper chiller-theme toggled">
		<a id="show-sidebar" class="btn btn-sm btn-dark py-3" href="#">
			<i class="fas fa-bars"></i>
		</a>

		@include('adminContratante.includes.menu-contratante')

		<!-- sidebar-wrapper  -->
		<main class="page-content">
			<div class="container-fluid">

				<div class="row text-center">
					<div class="col my-3">
						<h2>DETALHES DO CANDIDATO</h2>
					</div>
				</div>
			</div>



			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<a class="btn btn-primary" href="{{route('site.candidatos-vaga')}}">Voltar</a>
					</div>
				</div>
			</div>


			<div class="container-fluid">
				<div class="row">
					
					<div class="col-md-6">
						<h3 class="text-left">Perfil do Candidato</h3>
						<p class="text-left" style="font-size: 12px">Veja o perfil completo do candidato</p>

						<div class="">
							<p class="m-0 p-0"><b>Nome e Sobrenome</b></p>
							<p>{{$candidato->nome}} {{$candidato->sobrenome}}</p>
						</div>

						<div class="">
							<p class="m-0 p-0"><b>Data nascimento</b></p>
							<p>{{$candidato->data_nascimento}}</p>
						</div>

						<div class="">
							<p class="m-0 p-0"><b>Endereço</b></p>
							<p>{{$candidato->logradouro}}, {{$candidato->bairro}},  {{$candidato->localidade}}, {{$candidato->uf}}, {{$candidato->numero}}</p>
						</div>

						<div class="">
							<p class="m-0 p-0"><b>Sonhos e objetivos</b></p>
							<p>{{$candidato->sonhos_objetivos}}</p>
						</div>

						<div class="">
							<p class="m-0 p-0"><b>Um pouco da historia de vida</b></p>
							<p>{{$candidato->sua_historia}}</p>
						</div>

						<div class="">
							<p class="m-0 p-0"><b>Livros que leu ou que gostou de ler</b></p>
							<p>{{$candidato->livros}}</p>
						</div>

						<div class="">
							<p class="m-0 p-0"><b>O que gosta de fazer no tempo livre</b></p>
							<p>{{$candidato->hobbies}}</p>
						</div>

						<div class="">
							<p class="m-0 p-0"><b>Cursos que gostaria de fazer</b></p>
							<p>{{$candidato->cursos_gostaria}}</p>
						</div>
					</div>


					<div class="col-md-6">
						<div class="share">
							<h3 class="text-left">Redes sociais</h3>
							<p class="text-left" style="font-size: 12px">Visualize os trabalhos e conheça mais sobre o candidato através de suas redes sociais.</p>

							<!-- Button Instagram -->
							<div class="btn__container">

								@if($candidato->instagram != null || $candidato->instagram != "")
								<a target="_blank" href="https://www.instagram.com/{{$candidato->instagram}}" class="btn">
									<i class="fab fa-instagram"></i>
									<span>visualizar instagram</span>
								</a>
								@endif

								@if($candidato->facebook != null || $candidato->facebook != "")
								<a target="_blank" href="https://pt-br.facebook.com/{{$candidato->facebook}}" class="btn-f">
									<i class="fab fa-facebook"></i>
									<span>visualizar facebook</span>
								</a>
								@endif
							</div>

							<!-- Button Instagram -->
							<div class="btn__container">
								@if($candidato->twitter != null || $candidato->twitter != "")
								<a target="_blank" href="https://twitter.com/{{$candidato->twitter}}" class="btn-f">
									<i class="fab fa-twitter"></i>
									<span>visualizar twitter</span>
								</a>
								@endif

								@if($candidato->site != null || $candidato->site != "")
								<a target="_blank" href="{{$candidato->site}}" class="btn-s">
									<i class="fa fa-globe"></i>
									<span>visualizar site/portifólio</span>
								</a>
								@endif
							</div>
						</div>

						<div class="mt-3 share">
							<h3 class="text-left">Contato</h3>
							<p class="text-left" style="font-size: 12px">Entre em contato com o candidato</p>

							<div class="btn__container">
								@if($candidato->whatsapp != null || $candidato->whatsapp != "")
								<a target="_blank" href="https://api.whatsapp.com/send?phone={{$candidato->whatsapp}}&text=Olá! Entramos em contato porque gostamos do seu perfil cadastrado no Cacta vagas." class="btn-w">
									<i class="fab fa-whatsapp"></i>
									<span>chamar no whatsapp</span>
								</a>
								@endif
							</div>
						</div>

						
						<div class="">
							<p class="m-0 p-0"><b>Telefone</b></p>
							<p>{{$candidato->telefone}}</p>
						</div>


						<div class="">
							<p class="m-0 p-0"><b>E-mail</b></p>
							<p>{{$candidato->email}}</p>
						</div>

					</div>

				</div>
			</div>




			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<a class="btn btn-primary" href="{{route('site.candidatos-vaga')}}">Voltar</a>
					</div>
				</div>
			</div>







		</main>

		<!-- page-content" -->
	</div>
	<!-- page-wrapper -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
	crossorigin="anonymous"></script>


	@include('adminContratante.includes.modal-contratante')
	<script type="text/javascript" src="{{asset('/js/admin/admin-menu.js')}}"></script>

</body>
</html>