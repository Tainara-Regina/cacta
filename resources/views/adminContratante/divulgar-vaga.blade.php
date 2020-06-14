@extends('adminContratante.base')


@section('titulo') 
<title>Cacta Vagas - Cadastrar nova vaga</title>
@stop

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
crossorigin="anonymous">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/css/adminContrate/menu-admin.css')}}">
<link rel="stylesheet" href="{{asset('/css/layout-padrao.css')}}">
<link href="https://fonts.googleapis.com/css?family=Francois+One|Indie+Flower|Quicksand|Shadows+Into+Light&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/css/rodape.css')}}">
@stop


@section('conteudo')
<div class="container-fluid">
	<div class="row  p-0 m-0">
		<div class="col w p-0 m-0">
			<span class="text-right nome-empresa" style="">{{\Auth::user()->nome_empresa}}</span><br>
			<i> <span class="text-center staticText" id = "staticText" >"Ser empreendedor é <span style="color: green" id="typeline" ></span>"</span></i> <br>
			-<span class="cacta"> Cacta</span>
		</div>
		<a href="{{route('cactalogout')}}">
			<div class="col text-right btn-sair  p-0 m-0">
				<i class="fas fa-sign-out-alt" style="">
				</i>
				<p class="w">Sair</p>
			</div>
		</a>
	</div>
</div>


<div class="container-fluid  py-0 my-0">



	<div class="row">
		<div class="col text-center mb-5">


			@if(session()->has('message'))
			<div class="alert alert-success alert-dismissible py-4">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h4>{{ session()->get('message') }}</h4>
			</div>
			@endif

		</div>	
	</div>


	<div class="row p-0 m-0">
		<div class="col mb-3">
			<p class="text-left title-page" >Cadastrar nova vaga</p>
			<hr class="line" style="">
		</div>
	</div>


	<div class="row">
		<div class="col-sm-4">
			<div class="row b m-1">
				<div class="col p-3">
					<p class="w">Total de vagas divulgadas</p>
					<p class="total">{{$quantidade_de_vagas_cadastradas}}<span>/{{$quantidade_maxima_vagas_permitidas}}</span></p>
				</div>
				<div class="col-md-4 p-0 m-0  d-none d-md-block">
					<div class="h-100 w-100">
						<div class="mx-auto w-50">
							<i  class=" g fas fa-briefcase pt-5"></i>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="col-sm-4">
			<div class="row b m-1">
				<div class="col p-3">
					<p class="w">Vagas em destaque</p>
					<p class="total">{{$quantidade_destaque_cadastrado}}<span>/{{$quantidade_maxima_destaque_permitido}}</span></p>
				</div>
				<div class="col-md-4 p-0 m-0  d-none d-md-block">
					<div class="h-100 w-100">
						<div class="mx-auto w-50">
							<i class="fas fa-users g pt-5"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	

	<div class="container-fluid">
		<div class="row mt-5">
			<div class="col-md-7">
				<!-- 	<h3>Criar nova vaga</h3> -->
				<p style="font-size: 20px;" class="text-center w mb-5">Insira abaixo todas as informações para a nova vaga</p>

				<form class="form" action="{{route('site.cadastrar-vaga')}}" method="POST">

					@csrf




					@error('titulo')
					<span style="color: red">{{ $message }}</span>
					@enderror
					<div class="form-group">
						<div class="main">
							<label for="pwd">Título da vaga:</label>
							<select name="titulo">

								@foreach($titulos_vaga as $titulo_vaga)

								<option value="{{$titulo_vaga->id}}">{{$titulo_vaga->titulo}}</option>

								@endforeach

							</select>
						</div>
					</div>




					<div class="form-group">
						<label for="pwd">Faixa salarial de:</label>

						<input type="number" name="faixa_salarial_de" class="form-control" min="1" max="10000" id="pwd" placeholder="Ex: 2.000">
						<label>até:</label>
						<input type="number" name="faixa_salarial_ate" class="form-control"  min="1" max="10000" id="pwd" placeholder="Ex: 3.000">
					</div>

					<div class="form-group form-check">
						<label class="form-check-label">
							<input name="a_combinar" class="form-check-input" type="checkbox" name="remember"> A combinar
						</label>
					</div>


					@error('contratacao')
					<span style="color: red">{{ $message }}</span>
					@enderror

					<div class="form-group">
						<label for="pwd">Contratação:</label>

						<div class="form-check">
							<label class="form-check-label" for="radio1">
								<input type="radio" class="form-check-input" id="radio1" name="contratacao" value="fixo">Fixo
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label" for="radio2">
								<input type="radio" class="form-check-input" id="radio2" name="contratacao" value="temporario">Temporario
							</label>
						</div>
					</div>



					@error('quantidade_vaga')
					<span style="color: red">{{ $message }}</span>
					@enderror

					<div class="form-group row">
						<label for="example-number-input" class="col col-form-label">Quantidade de vaga:</label>
						<div class="col">
							<input name="quantidade_vaga" class="form-control w-50" min="1" max="99" type="number" value="{{old('quantidade_vaga')}}" id="example-number-input" required>
						</div>
					</div>


					@error('descricao')
					<span style="color: red">{{ $message }}</span>
					@enderror
					<div class="form-group">
						<label for="email">Descrição:</label>
						<textarea name="descricao" placeholder='Conte um pouco sobre a empresa, fale sobre a vaga e as habilidades que procura no candidato. Ex: A empresa "Exemplo" está procurando profissionais que se identificam  com a empresa para compor nossa equipe. As principais atividades realizadas da vaga são...'  class="form-control" rows="5" id="comment" required>{{old('descricao')}}</textarea>
					</div>

					@error('requisitos')
					<span style="color: red">{{ $message }}</span>
					@enderror
					<div class="form-group">
						<label for="pwd">Requisitos:</label>
						<textarea name="requisitos" placeholder="Descreva aqui todas as habilidades e experiencias necessarias para ocupar a vaga." class="form-control" rows="5" id="comment" required>{{old('requisitos')}}</textarea>
					</div>

					@error('desejavel')
					<span style="color: red">{{ $message }}</span>
					@enderror
					<div class="form-group">
						<label for="comment">Desejável:</label>
						<textarea name="desejavel" placeholder="Descreva aqui habilidades que não são obrigatórias para a vaga mas seriam consideradas um diferencial caso o candidato possua. Deixe em branco caso não queira preencher."class="form-control" rows="5" id="comment">{{old('desejavel')}}</textarea>
					</div> 


					@error('beneficios')
					<span style="color: red">{{ $message }}</span>
					@enderror
					<div class="form-group">
						<label for="comment">Beneficios:</label>
						<textarea name="beneficios" placeholder="Descreva os beneficios da vaga. Deixe em branco caso não queira preencher."class="form-control" rows="5" id="comment">{{old('beneficios')}}</textarea>
					</div> 

					<div class="form-check mb-5">
						@if($utrapassou_limite_destaque == true)
						<label class="form-check-label" for="check1">
							<input name="vaga_em_destaque" type="checkbox" class="form-check-input" disabled>Deixar vaga em destaque?<br>
							<small>Atualize seu plano para poder destacar esta vaga nas primeiras páginas.</small>
						</label>
						@else
						<label class="form-check-label" for="check1">
							<input name="vaga_em_destaque" type="checkbox" class="form-check-input">Deixar vaga em destaque?
						</label>
						@endif 
					</div>

					<button type="submit" class="btn btn-primary mb-3">Salvar</button>
				</form>
			</div>

			<div class="col-md-5">
				<div class="w-100" style="height: 200px">
					<p class="text-center">
						<!-- propaganda aqui -->
					</p>
				</div>

				<div class="w-100 mt-5" style="height: 200px">
					<p class="text-center">
						<!-- propaganda aqui -->
					</p>
				</div>

			</div>
		</div>
	</div> 

</div>
@stop




@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('/js/admin/admin-menu.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/admin/adminContratante/home-admin.js')}}"></script>
@stop

