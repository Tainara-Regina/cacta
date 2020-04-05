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
						<h2>DETALHE DA VAGA</h2>
						<p>Veja os detalhes da vaga.</p>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<h3>Titúlo da vaga</h3>
						<p>{{$vagas->titulo}}</p>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<h3>Faixa salarial</h3>
						<p>De: {{$vagas->faixa_salarial_de}} até: {{$vagas->faixa_salarial_ate}}</p>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<h3>Contratação</h3>
						<p>{{$vagas->contratacao}}</p>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<h3>Quantidade de vagas</h3>
						<p>{{$vagas->quantidade_vaga}}</p>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<h3>A vaga está em destaque</h3>
						@if($vagas->vaga_em_destaque == 'off')
						<p>Não</p>
						@elseif($vagas->vaga_em_destaque == 'on')
						<p>Sim</p>
						@endif

					</div>
				</div>

				<div class="row">
					<div class="col">
						<h3>Descrição</h3>
						<p>{{$vagas->descricao}}</p>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<h3>Requisitos</h3>
						<p>{{$vagas->requisitos}}</p>
					</div>
				</div>


				<div class="row">
					<div class="col">
						<h3>Desejável</h3>
						<p>{{$vagas->desejavel}}</p>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<h3>Benefícios</h3>
						<p>{{$vagas->beneficios}}</p>
					</div>
				</div>

<div class="row">
	<div class="col">
		<a class="btn btn-primary" href="{{route('site.candidatos-vaga')}}">Voltar</a>
		<a class="btn btn-primary" href="{{route('site.editar-vaga',$vagas->id)}}">Editar</a>
		<a class="btn btn-primary" href="{{route('site.deleta-vaga',$vagas->id)}}">Deletar</a>
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