@extends('site.base')
@section('titulo')
<title>Cadastre-se contratante</title>
@stop

<!-- Bootstrap core CSS -->
@section('css')
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

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="{{asset('/js/mascara.js')}}"></script>
<link rel="stylesheet" href="{{asset('/css/formularioContratanteParte2.css')}}">
@stop



@section('conteudo')
@include('site.includes.menu-mobile')
<main role="main">
	@include('site.includes.menu')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-8 col-lg-10 col-xl-10 mx-auto my-5">
					<div class="row">
						<div class="col text-center">
							<h2>Seja bem vindo(a) {{$nome}}!</h2>
							<h4>Sua confirmação foi feita com sucesso!</h4>
							<h5 class="text-h3 mt-3">Esta é a última etapa para você encontrar aquela vaga. Você precisa completar o cadastro conseguir se candidatar as vagas.</h5>
						</div>
					</div>



					<form action="{{route('site.formularioCandidatoParte2')}}" id="formPart1" method="POST" enctype="multipart/form-data">
						@csrf

						<input type="hidden" name="id" value="{{$usuario->id}}">
						<input type="hidden" id="logradouro" name="logradouro" value="">
						<input type="hidden" id="bairro" name="bairro" value="">
						<input type="hidden" id="localidade" name="localidade" value="">
						<input type="hidden" id="uf" name="uf" value="">


						@error('id_segmento_enterece')
						<span style="color: red">{{ $message }}</span>
						@enderror
						<div class="form-group my-5">
							<div class="main">
								<label for="pwd"><b>Selecione o segmento e enterece</b></label>


								<select id="id_segmento_enterece" value="{{old('id_segmento_enterece')}}" name="id_segmento_enterece">

									@foreach ($segmentos as $segmento)

									<option  value="{{$segmento->segmento}}">{{ $segmento->segmento }}</option>

									@endforeach
								</select>
							</div>
						</div>


						<div class="form-group">
							<label for="email"><b>Seus sonhos objetivos</b></label>
							<textarea class="mt-2 form-control" name="sonhos_objetivos" placeholder='Descreva seus sonhos e objetivos' rows="5" id="comment"> {{old('sonhos_objetivos')}}</textarea>
						</div>



						<div class="form-group">
							<label for="email"><b>Sua historia</b></label>
							<textarea class="mt-2 form-control" name="sua_historia" placeholder='Sua historia' rows="5" id="comment">{{old('sua_historia')}}</textarea>
						</div>

						<div class="form-group">
							<label for="livros"><b>Livros que gostou de ler</b></label>
							<textarea class="mt-2 form-control" name="livros" placeholder='livros' rows="5" id="comment"> {{old('livros')}}</textarea>
						</div>


						<div class="form-group">
							<label for="hobbies"><b>hobbies</b></label>
							<textarea class="mt-2 form-control" name="hobbies" placeholder='hobbies' rows="5" id="comment">  {{old('hobbies')}}</textarea>
						</div>



						<div class="form-group">
							<label for="cursos_gostaria"><b>Cursos que gostaria de fazer</b></label>
							<textarea class="mt-2 form-control" name="cursos_gostaria" placeholder='cursos que gostaria de fazer' rows="5" id="comment">  {{old('cursos_gostaria')}}</textarea>
						</div>

						@error('escolariedade')
						<span style="color: red">{{ $message }}</span>
						@enderror
						<div class="form-group">
							<label for="escolariedade"><b>escolariedade</b></label>
							<input type="text" value="{{old('escolariedade')}}" name="escolariedade" placeholder="escolariedade" type="text" class="form-control">
						</div>


						<div class="form-group">
							<label for="email"><b>Whatsapp</b></label>

							@error('whatsapp')
							<div class="mt-3">
								<span style="color: red">{{ $message }}</span>
							</div>
							@enderror

							<input style="width: 400px!important" type="text" value="{{old('whatsapp')}}" name="whatsapp" placeholder="whatsapp" type="text" class="form-control mt-3" maxlength="20">
						</div>




						<label for="comment"><b>Redes sociais:</b></label>

						<div class="form-group">
							<input name="facebook" value="{{old('facebook')}}" type="text" class="form-control" placeholder="Facebook"></input>
						</div>

						<div class="form-group">
							<input name="instagram" value="{{old('instagram')}}" placeholder="Instagram" type="text" class="form-control"></input>
						</div>

						<div class="form-group">
							<input name="twitter" value="{{old('twitter')}}" placeholder="Twitter" type="text" class="form-control"></input>
						</div>

						<div class="form-group">
							<input name="site" placeholder="Site" value="{{old('site')}}" type="text" class="form-control"></input>
						</div>







						@error('cep')
						<span style="color: red">{{ $message }}</span> <br>
						@enderror

						@error('endereco')
						<span style="color: red">{{ $message }}</span>
						@enderror

						<div class="form-group">
							<label for="email"><b>Endereço</b></label>
							<input type="text" value="{{old('cep')}}" name="cep" placeholder="Digite o CEP" type="text" class="form-control cep">

							<input name="endereco" value="{{old('endereco')}}" class="mt-2 form-control endereco"  rows="5" id="comment">

							@error('numero')
							<div class="mt-3">
								<span style="color: red">{{ $message }}</span>
							</div>
							@enderror

							<input style="width: 100px!important" type="text" value="{{old('numero')}}" name="numero" placeholder="Número" type="text" class="form-control mt-3" maxlength="5">
						</div>

						<div class="form-group">

						</div>


						<div class="form-group">
							<label for="email"><b>Complemento</b></label>
							<textarea class="mt-2 form-control" name="complemento" placeholder='Digite o complemento do endereço.' rows="5" id="comment"></textarea>
						</div>










						<label class="form-check-label" for="check1">
							<input name="disponivel_banco_candidatos" type="checkbox" class="form-check-input" checked>Deseja ficar disponível no banco de candidatos?
						</label>

						<button type="submit" class="btn btn-primary mb-5">Prosseguir</button>
					</form>


				</div>
			</div>
		</div>
	</div>
</div>
</section>

</main>
@stop

@section('rodape')
@include('site.includes.rodape')
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{asset('js/slick.js')}}"></script>
<script src="{{asset('js/home.js')}}"></script>
<script src="{{asset('/js/formularioContratante-2.js')}}"></script>
@stop


