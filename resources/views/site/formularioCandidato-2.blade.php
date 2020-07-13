@extends('site.base')

@section('titulo')
<title>Cacta Vagas - Cadastre e encontre uma vaga</title>
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
							<h5 class="text-h3 mt-3">Esta é a última etapa para você encontrar aquela vaga. Você precisa completar o cadastro para conseguir se candidatar as vagas.</h5>
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
								<label for="pwd"><b>Selecione o segmento pretende encontrar uma vaga?</b></label>
								<label for="pwd">Obs: Você poderá se candidatar a vagas de outro seguimento.</label>


								<select id="id_segmento_enterece" value="{{old('id_segmento_enterece')}}" name="id_segmento_enterece" required>

									@foreach ($segmentos as $segmento)

									<option  value="{{$segmento->segmento}}">{{ $segmento->segmento }}</option>

									@endforeach
								</select>
							</div>
						</div>


						<div class="form-group">
							<label for="email"><b>Quer falar sobre seus objetivos de carreira? escreva aqui.</b></label>
							<textarea class="mt-2 form-control" name="sonhos_objetivos" placeholder='Descreva seus sonhos e objetivos.' rows="5" id="comment">{{old('sonhos_objetivos')}}</textarea>
						</div>


						<div class="form-group">
							<label><b>Tem alguma habilidade que gostaria de ressaltar? Algo que você faz bem na sua área? Alguma especialidade?</b></label>
							<textarea class="mt-2 form-control" name="especialidades" placeholder='É bom em algo na sua área? Escreva aqui.' rows="5" id="comment">{{old('especialidades')}}</textarea>
						</div>


						<div class="form-group">
							<label for="email"><b>Aqui você pode falar um pouco sobre você, fique a vontade.</b></label>
							<textarea class="mt-2 form-control" name="sua_historia" placeholder='Fale sobre você. Fique a vontade.' rows="5" id="comment">{{old('sua_historia')}}</textarea>
						</div>

						<div class="form-group">
							<label for="livros"><b>Quer falar sobre os livros que gostou de ler?</b></label>
							<textarea class="mt-2 form-control" name="livros" placeholder='Gosta de ler? Fale sobre seus livros.' rows="5" id="comment">{{old('livros')}}</textarea>
						</div>


						<div class="form-group">
							<label for="hobbies"><b>Quer falar sobre o que gosta de fazer no seu tempo livre?</b></label>
							<textarea class="mt-2 form-control" name="hobbies" placeholder='O que gosta de fazer no seu tempo livre?' rows="5" id="comment">{{old('hobbies')}}</textarea>
						</div>


						<div class="form-group">
							<label for="cursos_gostaria"><b>Tem algum curso ou especialização que gostaria de fazer?</b></label>
							<textarea class="mt-2 form-control" name="cursos_gostaria" placeholder='Cursos que gostaria de fazer.' rows="5" id="comment">{{old('cursos_gostaria')}}</textarea>
						</div>

						<label class="my-3" for="cursos_gostaria"><b>Você vai poder preencher sua experiências e cursos realizados quando estiver logado.</b></label>

						@error('escolariedade')
						<span style="color: red">{{ $message }}</span>
						@enderror
						<div class="form-group">
							<label for="escolariedade"><b>Escolariedade</b></label>
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
						<label for="comment"><b>É importante incluir suas redes sociais para que seus trabalhos postados sejam visulizados pelo contratante. Isso ajuda a aumentar suas chances de contratação.</b></label>

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
							<input type="text" value="{{old('cep')}}" name="cep" placeholder="Digite o CEP" type="text" class="form-control cep" required>

							<input name="endereco" value="{{old('endereco')}}" class="mt-2 form-control endereco"  rows="5" id="comment"  readonly="readonly">

							@error('numero')
							<div class="mt-3">
								<span style="color: red">{{ $message }}</span>
							</div>
							@enderror

							<input style="width: 100px!important" type="text" value="{{old('numero')}}" name="numero" placeholder="Número" type="text" class="form-control mt-3" maxlength="5" required>
						</div>

						
						<div class="form-group">
							<label for="email"><b>Complemento</b></label>
							<textarea class="mt-2 form-control" name="complemento" placeholder='Digite o complemento do endereço.' rows="5" id="comment"></textarea>
						</div>


						<label class="form-check-label" for="check1">
							<input name="disponivel_banco_candidatos" type="checkbox" class="form-check-input" checked>Deseja ficar disponível no banco de candidatos?(Seu perfil ficará disponível para que os contratantes lhe encontre).
						</label>

						<div class="g-recaptcha" data-sitekey="6Ld2DwEVAAAAADI7nTlqa3owIG_ED_qxplTSQ9AP"></div>

						<button type="submit" class="mt-3 btn btn-primary mb-5">Prosseguir</button>
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


