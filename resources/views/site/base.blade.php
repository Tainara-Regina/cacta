<!DOCTYPE html>
<html lang="pt">
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="cacta">
	@yield('titulo')
	
	@yield('css')
	
</head>


<body>
	@include('site.includes.menu-mobile')
	@yield('conteudo')
	@yield('rodape')
	@yield('js')

</body>
</html>




