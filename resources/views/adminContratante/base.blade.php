<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@yield('titulo')


	@yield('css')

</head>

<body>
	<div class="page-wrapper chiller-theme toggled">
		<a style="background-color: red" id="show-sidebar" class="btn btn-sm  py-3" href="#">
			<i class="fas fa-bars"></i>
		</a>

		@include('adminContratante.includes.menu-contratante')

		<!-- sidebar-wrapper  -->
		<main class="page-content">
			@yield('conteudo')

			@include('site.includes.rodape')
		</main>
	</div>





@yield('js')

</body>

</html>