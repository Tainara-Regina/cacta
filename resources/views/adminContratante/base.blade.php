<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@yield('titulo')


	@yield('css')
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-59TB33Z');</script>
<!-- End Google Tag Manager -->
</head>

<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-59TB33Z"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

		
		<div class="page-wrapper chiller-theme toggled">
			<a style="background-color: #9e9e9e85;color: black;" id="show-sidebar" class="btn btn-sm  py-3" href="#">
				<i class="fas fa-bars"></i>
			</a>

			@include('adminContratante.includes.menu-contratante')

			<!-- sidebar-wrapper  -->
			<main class="page-content">
@if($faltam > 0 &&  Auth::user()->cadastro_ativo == 0)

				<div class="container">
					<p class="text-left title-page" style="font-size: 24px">Você cancelou seu cadastro. <br>  Você tem {{$faltam}} dia(s) para acessar o painel.</p>
				</div>
@endif

				@yield('conteudo')

				@include('site.includes.rodape')
			</main>
		</div>





		@yield('js')

	</body>

	</html>