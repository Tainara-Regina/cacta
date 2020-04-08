
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
			<!-- <h2 class="mb-3">{!!$procurar_vaga->titulo!!}</h2> -->
			<div class="col px-5  has-search">
				<span class="fa fa-search form-control-feedback"></span>
				<input id="buscar"  type="text" class="form-control busca mx-auto" placeholder="Pesquise aqui. Ex: barbeiro, fotografo, barman,etc.">
				<h5 class="mt-3">Encontramos estas <strong>vagas</strong> listadas abaixo para você!</h5>

			</div>
		</div>
		<p class="m-0 p-0 text-right d-none d-sm-block" style="color: #fff"><i>{!!$fundo_vaga->titulo!!}</i></p>
	</section>


	<section class="conteudo-pesquisa">
		<div id="filtro" class="">
			<div class="container-fluid" style="background-color: #eeeeeeb3;">
				<div class="row">

					<div class="col-md-2">
						<h5 class="text-center mt-2 mt-sm-5">Encontramos: <b>332</b> vagas.</h5>
					</div>

					<div class="col-md-2 text-center">
						<p class="form-check-label mt-2 mt-sm-4 mb-2" for="inlineCheckbox1"><b>Onde?</b></p>
						<input type="text" class="form-control" id="" placeholder="Ex: São Paulo, Zona Sul" name="">
						<div class="form-check-inline  d-sm-none">
							<label class="form-check-label">
								<input id="filtrar" type="checkbox" class="form-check-input my-3" value=""> <strong>Deseja filtrar a busca?</strong> 
							</label>
						</div>
					</div>

					<div class="col-md-8 mt-2 table-responsive">
						<!-- desktop -->
						<table class="table d-none d-sm-block">
							<tbody>
								<tr style="line-height: 67px;">
									<td style="line-height: 18px;"><b>Estou procurando:</b></td>
									<td>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
											<label class="form-check-label" for="inlineCheckbox1">Fixo</label>
										</div>
									</td>
									<td>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
											<label class="form-check-label" for="inlineCheckbox1">Temporario</label>
										</div>
									</td>

									<td></td>
								</tr>
								<tr>
									<td><b>Area:</b></td>
									<td>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
											<label class="form-check-label" for="inlineCheckbox1">Barbeiro(a)</label>
										</div>
									</td>
									<td>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
											<label class="form-check-label" for="inlineCheckbox1">Tatuador(a)</label>
										</div>
									</td>

									<td>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
											<label class="form-check-label" for="inlineCheckbox1">Cozinheiro(a)</label>
										</div>
									</td>
								</tr>
								<tr>
									<td style="border-top: unset;"></td>
									<td style="border-top: unset;"> 
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
											<label class="form-check-label" for="inlineCheckbox1">Fotográfo(a)</label>
										</div>
									</td>
									<td style="border-top: unset;">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
											<label class="form-check-label" for="inlineCheckbox1">Bartender</label>
										</div>
									</td>
									<td style="border-top: unset;">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
											<label class="form-check-label" for="inlineCheckbox1">Musico(a)</label>
										</div>
									</td>

								</tr>
							</tbody>
						</table>



						<!-- mobile -->
						<table class="table  d-sm-none" style="display: none" id="filtro-mobile">
							<tbody>
								<tr style="line-height: 67px;">
									<td style="line-height: 18px;"><b>Estou procurando:</b></td>
									<td>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
											<label class="form-check-label" for="inlineCheckbox1">Fixo</label>
										</div>
									</td>
									<td>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
											<label class="form-check-label" for="inlineCheckbox1">Temporario</label>
										</div>
									</td>

								</tr>
								<tr>
									<td><b>Area:</b></td>
									<td>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
											<label class="form-check-label" for="inlineCheckbox1">Barbeiro(a)</label>
										</div>
									</td>
									<td>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
											<label class="form-check-label" for="inlineCheckbox1">Tatuador(a)</label>
										</div>
									</td>
								</tr>
								<tr>
									<td style="border-top: unset;"></td>
									<td style="border-top: unset;"> 
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
											<label class="form-check-label" for="inlineCheckbox1">Fotográfo(a)</label>
										</div>
									</td>
									<td style="border-top: unset;">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
											<label class="form-check-label" for="inlineCheckbox1">Bartender</label>
										</div>
									</td>
								</tr>



								<tr>
									<td style="border-top: unset;"></td>
									<td style="border-top: unset;">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
											<label class="form-check-label" for="inlineCheckbox1">Cozinheiro(a)</label>
										</div>
									</td>
									<td style="border-top: unset;">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
											<label class="form-check-label" for="inlineCheckbox1">Músico(a)</label>
										</div>
									</td>  
								</tr>



							</tbody>
						</table>



					</div>

				</div>
			</div>

			<div class="container vagas">
				<div class="row">
					<div class="col-md-8 col-sm-12">
						<a href="#">
							<div class="row text-center py-3" style="border-bottom: 1px solid #bdbdbd">
								<div class="col d-none d-sm-block"><img width="125px" src="https://cdn.pixabay.com/photo/2018/04/05/02/52/room-3291779__340.jpg">  
								</div>

								<div class="col">
									<p><b>Barbeiro</b></p>
									<p>Barbearia Dona Navalha</p>  
								</div>

								<div class="col">
									<p><b>Fixo</b></p>
									<p>São Paulo</p> 
								</div>

								<div class="col mt-4">
									<p class="vaga-destaque">Destaque</p>
								</div>
							</div>
						</a>



						<a href="#">
							<div class="row text-center py-3" style="border-bottom: 1px solid #bdbdbd">
								<div class="col d-none d-sm-block"><img width="125px" src="https://cdn.pixabay.com/photo/2018/04/05/02/52/room-3291779__340.jpg">  
								</div>

								<div class="col">
									<p><b>Barbeiro</b></p>
									<p>Barbearia Dona Navalha</p>  
								</div>

								<div class="col">
									<p><b>Fixo</b></p>
									<p>São Paulo</p> 
								</div>

								<div class="col mt-4">
									<p class="vaga-destaque">Destaque</p>
								</div>
							</div>
						</a>





						<a href="#">
							<div class="row text-center py-3" style="border-bottom: 1px solid #bdbdbd">
								<div class="col d-none d-sm-block"><img width="125px" src="https://cdn.pixabay.com/photo/2018/04/05/02/52/room-3291779__340.jpg">  
								</div>

								<div class="col">
									<p><b>Barbeiro</b></p>
									<p>Barbearia Dona Navalha</p>  
								</div>

								<div class="col">
									<p><b>Fixo</b></p>
									<p>São Paulo</p> 
								</div>

								<div class="col mt-4">
									<p class="vaga-destaque">Destaque</p>
								</div>
							</div>
						</a>


						<a href="#">
							<div class="row text-center py-3" style="border-bottom: 1px solid #bdbdbd">
								<div class="col d-none d-sm-block"><img width="125px" src="https://cdn.pixabay.com/photo/2018/04/05/02/52/room-3291779__340.jpg">  
								</div>

								<div class="col">
									<p><b>Barbeiro</b></p>
									<p>Barbearia Dona Navalha</p>  
								</div>

								<div class="col">
									<p><b>Fixo</b></p>
									<p>São Paulo</p> 
								</div>

								<div class="col mt-4">
									<p class="vaga-destaque">Destaque</p>
								</div>
							</div>
						</a>



						<a href="#">
							<div class="row text-center py-3" style="border-bottom: 1px solid #bdbdbd">
								<div class="col d-none d-sm-block"><img width="125px" src="https://cdn.pixabay.com/photo/2018/04/05/02/52/room-3291779__340.jpg">  
								</div>

								<div class="col">
									<p><b>Barbeiro</b></p>
									<p>Barbearia Dona Navalha</p>  
								</div>

								<div class="col">
									<p><b>Fixo</b></p>
									<p>São Paulo</p> 
								</div>

								<div class="col mt-4">
									<p class="vaga-destaque">Destaque</p>
								</div>
							</div>
						</a>
						<a href="#">
							<div class="row text-center py-3" style="border-bottom: 1px solid #bdbdbd">
								<div class="col d-none d-sm-block"><img width="125px" src="https://cdn.pixabay.com/photo/2018/04/05/02/52/room-3291779__340.jpg">  
								</div>

								<div class="col">
									<p><b>Barbeiro</b></p>
									<p>Barbearia Dona Navalha</p>  
								</div>

								<div class="col">
									<p><b>Fixo</b></p>
									<p>São Paulo</p> 
								</div>

								<div class="col mt-4">
									<p class="vaga-destaque">Destaque</p>
								</div>
							</div>
						</a>
					</div>


					<div class="col-md-4 d-none d-sm-block" style="padding-top: 100px">
						<div class="ml-5 w-100 bg-danger sticky-top">
							<p class="p-5 my-5">Publicidade aqui</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col text-center">
				<a class="btn my-3 cadastre animated rubberBand btn-cadastre-se" href="">Carregar mais vagas</a>
			</div>

		</div>
	</section>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="{{asset('js/slick.js')}}"></script>
	<script src="{{asset('js/lista-vagas.js')}}"></script>



	<script type="text/javascript">
		$(document).ready(function(){
			$('html, body').stop().animate({scrollTop:300}, 800);
		});
	</script>




</body>
</html>




