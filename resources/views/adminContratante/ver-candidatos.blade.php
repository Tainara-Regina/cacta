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
						<h2>Vaga {{$vaga_nome->titulo}}</h2>
						<p>Veja os candidatos da vaga.</p>

						<h2>Total de candidatos: {{$total}}</h2>
					</div>
				</div>
			</div>




			<div class="container">
				<div class="row">
					<div class="col-12">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th scope="col">Nome do candidato</th>
									<th scope="col">Data de candidatura</th>
									<th scope="col">Ver detalhes</th>
								</tr>
							</thead>
							<tbody>

								@foreach($candidatos as $candidato)
								<tr>
									<td>{{$candidato->nome}} {{$candidato->sobrenome}}</td>
									<td>{{ Carbon\Carbon::parse($candidato->canditatura_em)->format('d/m/Y')}}</td>
									<td class="text-center">
<a href="{{route('site.detalhes-candidato',['id_candidato' => $candidato->id ,'id_vaga' => $vaga_nome->id ])}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
										<!-- <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
										<button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button> -->
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
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