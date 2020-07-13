@extends('site.base')

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@stop


@section('titulo')
<title>Cacta Vagas - Cadastre e encontre uma vaga</title>
@stop

@section('conteudo')
<main role="main">
	@include('site.includes.menu')
	<section>
		<div class="container">
			<div class="row">
				<div class="col mt-5 col-10 mx-auto">
					<h2 class="text-h3 text-center" >Olá!</h2>
					<h5 class="text-h3 text-center"> <b>Seja muito bem vindo(a) ao Cacta vagas!</b></h5>

					<p class="text-h3 mt-3 text-center" style="font-size: 20px;">Queremos te ajudar a encontrar a vaga de emprego que procura.
					Cadastre-se para poder se candidatar as vagas disponíveis e ser encontrado por empresas cadastradas.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-8 col-lg-8 col-xl-6 mx-auto mt-3">

					<form action="{{route('site.formularioCandidatoParte1')}}" id="formPart1" method="POST" enctype="multipart/form-data">

						@csrf

						@error('nome')
						<span style="color: red">{{ $message }}</span>
						@enderror
						<div class="form-group">
							<label for="nome"><b>Insira nome</b></label>
							<input placeholder="Qual o seu nome?" value="{{old('nome')}}" type="text" name="nome" class="form-control" required>
						</div>

						@error('sobrenome')
						<span style="color: red">{{ $message }}</span>
						@enderror
						<div class="form-group">
							<label for="email"><b>Sobrenome</b></label>
							<input placeholder="Insira o seu sobrenome"  value="{{old('sobrenome')}}" type="text" name="sobrenome" class="form-control" required>
						</div>


						@error('email')
						<span style="color: red">{{ $message }}</span>
						@enderror
						<div class="form-group">
							<label for="email"><b>E-mail</b></label>
							<input placeholder="Insira seu e-mail" type="email" value="{{old('email')}}" name="email" class="form-control" required>
						</div>


						@error('data_nascimento')
						<span style="color: red">{{ $message }}</span>
						@enderror
						<div class="form-group">
							<label for="email"><b>Data nascimento</b></label>
							<input placeholder="Data de nascimento" type="date" value="{{old('data_nascimento')}}" name="data_nascimento" class="form-control" required>
						</div>



						@error('sexo')
						<span style="color: red">{{ $message }}</span>
						@enderror
						<label for="email"><b>Gênero</b></label>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" value="feminino" name="sexo">Feminino
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" value="masculino" class="form-check-input" name="sexo">Masculino
							</label>
						</div>



						@error('telefone')
						<span style="color: red">{{ $message }}</span>
						@enderror
						<div class="form-group">
							<label for="telefone"><b>Telefone</b></label>
							<input type="text" value="{{old('telefone')}}" name="telefone" placeholder="Insira o seu telefone" type="text" class="form-control phone_with_ddd" required>
						</div>



						@error('uf')
						<span style="color: red">{{ $message }}</span>
						@enderror

						<div class="form-group">
							<label for="estado"><b>Estado</b></label>
							<select class="form-control" id="exampleFormControlSelect1" name="uf" required>
								<option disabled selected>selecione seu estado</option>
								<option value="AC">Acre</option>
								<option value="AL">Alagoas</option>
								<option value="AP">Amapá</option>
								<option value="AM">Amazonas</option>
								<option value="BA">Bahia</option>
								<option value="CE">Ceará</option>
								<option value="DF">Distrito Federal</option>
								<option value="ES">Espírito Santo</option>
								<option value="GO">Goiás</option>
								<option value="MA">Maranhão</option>
								<option value="MT">Mato Grosso</option>
								<option value="MS">Mato Grosso do Sul</option>
								<option value="MG">Minas Gerais</option>
								<option value="PA">Pará</option>
								<option value="PB">Paraíba</option>
								<option value="PR">Paraná</option>
								<option value="PE">Pernambuco</option>
								<option value="PI">Piauí</option>
								<option value="RJ">Rio de Janeiro</option>
								<option value="RN">Rio Grande do Norte</option>
								<option value="RS">Rio Grande do Sul</option>
								<option value="RO">Rondônia</option>
								<option value="RR">Roraima</option>
								<option value="SC">Santa Catarina</option>
								<option value="SP">São Paulo</option>
								<option value="SE">Sergipe</option>
								<option value="TO">Tocantins</option>
								<option value="EX">Estrangeiro</option>
							</select>
						</div>


						@error('localidade')
						<span style="color: red">{{ $message }}</span>
						@enderror
						<div class="form-group">
							<label><b>Cidade</b></label>
							<input type="text" value="{{old('localidade')}}" name="localidade" placeholder="Cidade" type="text" class="form-control" required>
						</div>

						@error('password')
						<span style="color: red">{{ $message }}</span>
						@enderror
						<div class="form-group">
							<label for="password"><b>Senha</b></label>
							<input type="password" name="password" value="{{old('password')}}" placeholder="Defina uma senha" type="text" class="form-control" required>
						</div>

						@error('password_confirmation')
						<span style="color: red">{{ $message }}</span>
						@enderror
						<div class="form-group">
							<label for="repetir_senha"><b>Repetir senha</b></label>
							<input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" placeholder="Repetir senha" type="text" class="form-control" required>
						</div>




					<div class="form-group form-check mb-5 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" value="true" type="checkbox" name="termos" required> Aceito o 
                 <a href="{{route('site.termo-uso')}}">termo de uso</a> e o de <a href="{{route('site.termo-cancelamento')}}">termo de cancelamento</a>.
              </label>
            </div>



						@error('g-recaptcha-response')
						<span style="color: red">{{ $message }}</span>
						@enderror
						<div class="g-recaptcha" data-sitekey="6Ld2DwEVAAAAADI7nTlqa3owIG_ED_qxplTSQ9AP"></div>
						

						<button type="submit" class=" mt-3 btn btn-primary mb-5">Prosseguir</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="{{asset('/js/mascara.js')}}"></script>
@stop





