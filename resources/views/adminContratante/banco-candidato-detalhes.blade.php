@extends('adminContratante.base')


@section('titulo')
<title>Cacta Vagas - Banco de candidatos</title>
@stop

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
crossorigin="anonymous">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/css/adminContrate/menu-admin.css')}}">

<link rel="stylesheet" href="{{asset('/css/adminContrate/admin-contratante.css')}}">

<link rel="stylesheet" href="{{asset('/css/layout-padrao.css')}}">
<link href="https://fonts.googleapis.com/css?family=Francois+One|Indie+Flower|Quicksand|Shadows+Into+Light&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/css/rodape.css')}}">
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
		<div class="col my-3">
			<a href="{{ URL::previous() }}">
				<div class="col text-left btn-sair  p-0 m-0">
					<i class="fa fa-reply" style="">
					</i>
					<p class="w">Voltar</p>
				</div>
			</a>
		</div>
	</div>






	<div class="row p-0 m-0">
		<div class="col mb-3">
			<p class="text-left title-page" >Detalhes do candidato</p>
			<hr class="line" style="">
		</div>
	</div>



	<div class="row">
		<div class="col-sm-12">
			<div class="row b m-1">
				<div class="col p-3">
					<p class=""><b>Nome:</b> {{$candidato->nome}} {{$candidato->sobrenome}}</p>
					<p class=""><b>Endereço:</b> {{$candidato->logradouro}}, {{$candidato->numero}}, {{$candidato->bairro}},  {{$candidato->localidade}}, {{$candidato->uf}}</p>
				</div>
				<div class="col p-3">
					<p><b>Data de nascimento: </b>{{ Carbon\Carbon::parse($candidato->data_nascimento)->format('d/m/Y')}}</p>
					<p><b>Gênero:</b> {{$candidato->sexo}}</p>
				</div>
			</div>
		</div>
	</div>

	<div class="row share">
		<div class="col-sm-12 mt-3">
			<div class="row b m-1">
				<div class="col p-3">
					<p class="text-left w" style="font-size: 12px">Visualize os trabalhos e conheça mais sobre o candidato através de suas redes sociais.</p>
					

					<div class="btn__container">

						@if($candidato->instagram != null || $candidato->instagram != "")
						<a target="_blank" href="https://www.instagram.com/{{$candidato->instagram}}" class="btn">
							<i class="fab fa-instagram"></i>
							<span>visualizar instagram</span>
						</a>
						@endif

						@if($candidato->facebook != null || $candidato->facebook != "")
						<a target="_blank" href="https://pt-br.facebook.com/{{$candidato->facebook}}" class="btn-f">
							<i class="fab fa-facebook"></i>
							<span>visualizar facebook</span>
						</a>
						@endif
					</div>


					<div class="btn__container">
						@if($candidato->twitter != null || $candidato->twitter != "")
						<a target="_blank" href="https://twitter.com/{{$candidato->twitter}}" class="btn-f">
							<i class="fab fa-twitter"></i>
							<span>visualizar twitter</span>
						</a>
						@endif

						@if($candidato->site != null || $candidato->site != "")
						<a target="_blank" href="{{$candidato->site}}" class="btn-s">
							<i class="fa fa-globe"></i>
							<span>visualizar site/portifólio</span>
						</a>
						@endif
					</div>


				</div>
			</div>
		</div>
	</div>





	<div class="row">
		<div class="col-sm-12 mt-3">
			<div class="row b m-1">
				<div class="col-12">
					<p class="text-left w pt-3" style="font-size: 12px">Contato</p>
				</div>
				@if($candidato->whatsapp != null || $candidato->whatsapp != "")
				<div class="col p-3 share">
					<div class="btn__container">
						
						<a target="_blank" href="https://api.whatsapp.com/send?phone={{$candidato->whatsapp}}&text=Olá! Entramos em contato porque gostamos do seu perfil cadastrado no Cacta vagas." class="btn-w">
							<i class="fab fa-whatsapp"></i>
							<span>chamar no whatsapp</span>
						</a>
					</div>
				</div>
				@endif

				<div class="col p-3">
					<p class=""><b>Telefone: </b>{{$candidato->telefone}}</p>
					<p class=""><b>E-mail: </b>{{$candidato->telefone}}</p>
					@if($candidato->whatsapp != null || $candidato->whatsapp != "")
					<p class=""><b>Whatsapp: </b>{{$candidato->whatsapp}}</p>
					@endif
				</div>

			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-sm-12 mt-3">
			<div class="row b m-1">
				<div class="col p-3">
					<p class=""><b>Escolariedade </b></p>
					
					<div>
						{{$candidato->escolariedade}}
					</div>

				</div>
				
			</div>
		</div>
	</div>


<div class="row">
		<div class="col-sm-12 mt-3">
			<div class="row b m-1">
				<div class="col p-3">
					<p class=""><b>Habilidade ou especialidade</b></p>
					
					<div>
						{{$candidato->especialidades}}
					</div>

				</div>
				
			</div>
		</div>
	</div>






	<div class="row">
		<div class="col-sm-12 mt-3">
			<div class="row b m-1">
				<div class="col p-3">
					<p class=""><b>Sonhos e objetivos </b></p>
					
					<div>
						{{$candidato->sonhos_objetivos}}
					</div>

				</div>
				
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-sm-12 mt-3">
			<div class="row b m-1">
				<div class="col p-3">
					<p class=""><b>Um pouco da historia de vida </b></p>
					
					<div>
						{{$candidato->sua_historia}}
					</div>

				</div>
				
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-sm-12 mt-3">
			<div class="row b m-1">
				<div class="col p-3">
					<p class=""><b>Livros que leu ou que gostou de ler </b></p>
					
					<div>
						{{$candidato->livros}}
					</div>

				</div>
				
			</div>
		</div>
	</div>




	<div class="row">
		<div class="col-sm-12 mt-3">
			<div class="row b m-1">
				<div class="col p-3">
					<p class=""><b>O que gosta de fazer no tempo livre </b></p>
					
					<div>
						{{$candidato->hobbies}}
					</div>

				</div>
				
			</div>
		</div>
	</div>




	<div class="row">
		<div class="col-sm-12 mt-3 mb-5">
			<div class="row b m-1">
				<div class="col p-3">
					<p class=""><b>Cursos que gostaria de fazer </b></p>
					
					<div>
						{{$candidato->cursos_gostaria}}
					</div>

				</div>
				
			</div>
		</div>
	</div>






	<div class="row">
		<div class="col">
			<h3>Experiências profissionais</h3>
		</div>
	</div>

	@foreach($experiencias as $experiencia)
	<div class="row">
		<div class="col-sm-12 mt-3 mb-5">
			<div class="row b m-1">
				<div class="col p-3">
					<p class=""><b>Nome da empresa</b></p>
					
					<div>
						{{$experiencia->nome_empresa}}
					</div>

				</div>


				<div class="col p-3">
					<p class=""><b>Cargo</b></p>
					<div>
						{{$experiencia->cargo}}
					</div>

				</div>


				<div class="col-12 p-3">
					<p class=""><b>Inicio</b></p>
					<div>
						{{ Carbon\Carbon::parse($experiencia->inicio)->format('d/m/Y')}}
					</div>
				</div>


				<div class="col-12 p-3">
					<p class=""><b>Conclusão</b></p>
					<div>
						{{ Carbon\Carbon::parse($experiencia->conclusao)->format('d/m/Y')}}
						
					</div>
				</div>


				<div class="col-12 p-3">
					<p class=""><b>Descrição</b></p>
					
					<div>
						{{$experiencia->descricao}}
					</div>

				</div>
				
			</div>
		</div>
	</div>
	@endforeach





	<div class="row">
		<div class="col">
			<h3>Cursos/ Workshops/ Especializações</h3>
		</div>
	</div>

	@foreach($cursos as $experiencia)
	<div class="row">
		<div class="col-sm-12 mt-3 mb-5">
			<div class="row b m-1">
				<div class="col p-3">
					<p class=""><b>Curso</b></p>
					<div>
						{{$experiencia->nome_curso}}
					</div>

				</div>

				<div class="col p-3">
					<p class=""><b>Nome da instituição</b></p>
					
					<div>
						{{$experiencia->nome_instituicao}}
					</div>
				</div>


				<div class="col p-3">
					<p class=""><b>Grau</b></p>
					<div>
						{{$experiencia->grau}}
					</div>

				</div>


				<div class="col-12 p-3">
					<p class=""><b>Inicio</b></p>
					<div>
						{{ Carbon\Carbon::parse($experiencia->inicio)->format('d/m/Y')}}
					</div>
				</div>


				<div class="col-12 p-3">
					<p class=""><b>Conclusão</b></p>
					<div>
						{{ Carbon\Carbon::parse($experiencia->conclusao)->format('d/m/Y')}}
						
					</div>
				</div>


				<div class="col-12 p-3">
					<p class=""><b>Observações</b></p>
					
					<div>
						{{$experiencia->obsrvacao}}
					</div>

				</div>
				
			</div>
		</div>
	</div>
	@endforeach



	<div class="row">
		<div class="col my-3">
			<a href="{{ URL::previous() }}">
				<div class="col text-left btn-sair  p-0 m-0">
					<i class="fa fa-reply" style="">
					</i>
					<p class="w">Voltar</p>
				</div>
			</a>
		</div>
	</div>

</div>
@stop