<!DOCTYPE html>
<html lang="pt">
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="cacta">
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
	@include('site.includes.menu-mobile')
	@yield('conteudo')
	@yield('rodape')
	@yield('js')

</body>
</html>




