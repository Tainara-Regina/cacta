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
						<h2>VAGAS DIVULGADAS</h2>
						<p>Veja os detalhes de todos os candidatos das suas vagas e edite a vaga se for preciso.</p>
					</div>
				</div>

				<div class="row my-3 mb-5">


					@foreach($vagas as $vaga)
					
					<div class="col">
						<div class="card card-inverse mh-100 h-100">
							<div class="card-block bg-secondary">
								<div class="rotate">
									<i class="fa fa-share fa-5x"></i>
								</div>
								<h4 class="text-uppercase">{{$vaga->titulo}}</h4>

								<p><i>Disponivel de {{ Carbon\Carbon::parse($vaga->data_de_criacao)->format('d/m/Y')}} de até {{ Carbon\Carbon::parse($vaga->data_de_expiracao)->format('d/m/Y') }} </i></p>
								<h6 class="text-uppercase mb-3">3 Pessoas se cadidtaram</h6>
								<ul class="p-0" style="/*position: absolute;*/bottom: 0px;list-style: none;">
									<a href=""><li> Ver candidatos</li></a>
									<li><a href="{{route('site.ver-vaga',$vaga->id)}}"> Ver vaga</a></li>
									<li><a href="{{route('site.editar-vaga',$vaga->id)}}">Editar vaga</a></li>
									<li><a href="{{route('site.deleta-vaga',$vaga->id)}}">Deletar vaga</a></li>

								</ul>
							</div>
						</div>
					</div>
						
					@endforeach
				
		<!-- 			<div class="col">
						<div class="card card-inverse mh-100 h-100">
							<div class="card-block bg-dark">
								<div class="rotate">
									<i class="fa fa-share fa-5x"></i>
								</div>
								<h4 class="text-uppercase">vaga para recepcionista</h4>

								<p><i>Disponivel até 02/04/2020</i></p>
								<h6 class="text-uppercase mb-5">3 Pessoas se cadidtaram</h6>

								<ul class="p-0" style="position: absolute;bottom: 0px;list-style: none;">
									<li>Ver todos candidatos</li>
									<li>Editar</li>
								</ul>

							</div>
						</div>
					</div> -->


				<!-- 	<div class="col">
						<div class="card card-inverse mh-100 h-100">
							<div class="card-block bg-dark">
								<div class="rotate">
									<i class="fa fa-share fa-5x"></i>
								</div>
								<h4 class="text-uppercase">vaga para recepcionista</h4>

								<p><i>Disponivel até 02/04/2020</i></p>
								<h6 class="text-uppercase mb-5">3 Pessoas se cadidtaram</h6>
								
								<ul class="p-0" style="position: absolute;bottom: 0px;list-style: none;">
									<li>Ver todos candidatos</li>
									<li>Editar</li>
								</ul>

							</div>
						</div>
					</div> -->
				</div>



	<!-- 			<div class="row">
					<div class="col">
						<table class="table mb-3 mt-5">
							<thead class="thead-dark">
								<tr>
									<th scope="col">Vaga</th>
									<th scope="col">Nome</th>
									<th scope="col">Avaliação</th>
									<th scope="col">Opções</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>vaga para barbeiro</td>
									<td>Mark</td>
									<td>5</td>
									<td>
										<button type="button" data-toggle="modal" data-target="#contratanteModal" class="btn btn-info">Ver perfil completo</button>
									</td>
								</tr>
								<tr>
									<td>vaga para barbeiro</td>
									<td>Jacob</td>
									<td>3</td>
									<td>
										<button type="button" data-toggle="modal" data-target="#contratanteModal" class="btn btn-info">Ver perfil completo</button>
									</td>
								</tr>
								<tr>
									<td>vaga para barbeiro</td>
									<td>Larry</td>
									<td>2</td>
									<td>
										<button type="button" data-toggle="modal" data-target="#contratanteModal" class="btn btn-info">Ver perfil completo</button>
									</td>
								</tr>
							</tbody>
						</table>

					</div>
				</div> -->
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