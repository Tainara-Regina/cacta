@extends('adminCandidato.base')

@section('titulo')
<title>Cacta - Admin Home</title>
@stop

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
crossorigin="anonymous">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/css/adminContrate/menu-admin.css')}}">
<link rel="stylesheet" href="{{asset('/css/layout-padrao.css')}}">
<link rel="stylesheet" href="{{asset('/css/adminContrate/meus-dados-pessoais.css')}}">
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
<script type="text/javascript" src="{{asset('/js/admin/adminContratante/meus-dados.js')}}"></script>
<script src="{{asset('/js/formularioContratante-2.js')}}"></script>

<script type="text/javascript">
	
	$(document).ready(function() {
		$(".delete").hide();
  //when the Add Field button is clicked
  $("#add").click(function(e) {
  	$(".delete").fadeIn("1500");
    //Append a new row of code to the "#items" div
    $("#items").append(
    	'<div class="next-referral col-md-8 margin-bottom"><hr class="mb-5"><input type="hidden" name="experiencia" value=true><div class="form-group"><label class=" control-label" for="textinput">Nome da empresa</label><input class="form-control my-2" name="nome_empresa[]"  type="text" placeholder="Nome da empresa" class="form-control input-md"><label class=" control-label" for="textinput">Cargo</label><input class="form-control my-2" name="cargo[]"  type="text" placeholder="Cargo" class="form-control input-md"><label class=" control-label" for="textinput">Data de inicio</label><input class="form-control my-2" name="inicio[]"  type="date" placeholder="Data de inicio" class="form-control input-md"><label class=" control-label" for="textinput">Conclusão</label><input class="form-control my-2" name="conclusao[]"  type="date" placeholder="Datade termino" class="form-control input-md"><label class=" control-label" for="textinput">Descrição da vaga</label><textarea class="form-control my-2" name="descricao[]" placeholder="Descrição da vaga"></textarea></div></div>');
});
  $("body").on("click", ".delete", function(e) {
  	$(".next-referral").last().remove();
  });
});

</script>






<script type="text/javascript">
	
	$(document).ready(function() {
		$(".delete-2").hide();
  //when the Add Field button is clicked
  $("#add-2").click(function(e) {
  	$(".delete-2").fadeIn("1500");
    //Append a new row of code to the "#items" div
    $("#items-2").append(
    	'<div class="next-referral-2 col-md-8 margin-bottom"><hr class="mb-5"><input type="hidden" name="cursos" value=true><div class="form-group"><label class=" control-label" for="textinput">Curso</label><input class="form-control my-2" name="nome_curso[]"  type="text" placeholder="Curso" class="form-control input-md"><label class=" control-label" for="textinput">Nome da instituição</label><input class="form-control my-2" name="nome_instituicao[]"  type="text" placeholder="Nome da instituição" class="form-control input-md"><label class=" control-label" for="textinput">Grau</label><input class="form-control my-2" name="grau[]"  type="text" placeholder="Grau" class="form-control input-md"><label class=" control-label" for="textinput">Data de inicio</label><input class="form-control my-2" name="inicio[]"  type="date" placeholder="Data de inicio" class="form-control input-md"><label class=" control-label" for="textinput">Conclusão</label><input class="form-control my-2" name="conclusao[]"  type="date" placeholder="Datade termino" class="form-control input-md"><label class=" control-label" for="textinput">Observação</label><textarea class="form-control my-2" name="observacao[]" placeholder="Observação"></textarea></div></div>');
});
  $("body").on("click", ".delete-2", function(e) {
  	$(".next-referral-2").last().remove();
  });
});

</script>



@stop



@section('conteudo')

<div class="container-fluid">
	<div class="row  p-0 m-0">
		<div class="col w p-0 m-0">
			@if(session()->has('message'))
			<div class="alert alert-success alert-dismissible py-3 mr-4">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h4>{{ session()->get('message') }}</h4>
			</div>
			@endif

			@if(session()->has('cursos-fail'))
			<div class="alert alert-danger alert-dismissible py-3 mr-4">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h5>{{ session()->get('cursos-fail') }}</h5>
			</div>
			@endif



			@if(session()->has('experiencia-fail'))
			<div class="alert alert-danger alert-dismissible py-3 mr-4">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h5>{{ session()->get('experiencia-fail') }}</h5>
			</div>
			@endif



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


<div class="container-fluid">
	<div class="row p-0 m-0">
		<div class="col mb-3">
			<p class="text-left title-page p-0 m-0" >Meus dados pessoais</p>
			<p class="text-left w p-0 m-0" >Atualize os dados pessoais.</p>
			<hr class="line" style="">
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-9">

		<form class="form" action="{{route('cadastrar-meu-perfil')}}" id="formPart1" method="POST" enctype="multipart/form-data">
			@csrf

			@error('id_segmento_enterece')
			<span style="color: red">{{ $message }}</span>
			@enderror
			<div class="form-group my-5">
				<div class="main">
					<label for="pwd">Selecione o segmento e enterece</label>


					<select id="id_segmento_enterece" value="{{$cadastro->id_plano}}" name="id_segmento_enterece">

						@foreach ($segmentos as $segmento)

						@if($segmento->id == $cadastro->id_segmento_enterece)
						<option  value="{{ $cadastro->id_segmento_enterece}}" selected>{{ $segmento->segmento }}</option>
						@else
						<option  value="{{ $segmento->id }}">{{ $segmento->segmento }}</option>

						@endif

						@endforeach
					</select>
				</div>
			</div>



			@error('escolariedade')
			<span style="color: red">{{ $message }}</span>
			@enderror
			<div class="form-group">
				<label for="escolariedade">escolariedade</label>
				<input type="text" value="{{ $cadastro->escolariedade }}" name="escolariedade" placeholder="escolariedade" type="text" class="form-control">
			</div>



			<div class="form-group">
				<label for="email">Seus sonhos objetivos</label>
				<textarea class="mt-2 form-control" name="sonhos_objetivos" placeholder='Descreva seus sonhos e objetivos' rows="5" id="comment"> {{ $cadastro->sonhos_objetivos }}</textarea>
			</div>



			<div class="form-group">
				<label for="email">Sua historia</label>
				<textarea class="mt-2 form-control" name="sua_historia" placeholder='Sua historia' rows="5" id="comment"> {{ $cadastro->sua_historia}}</textarea>
			</div>

			<div class="form-group">
				<label for="livros">Livros que gostou de ler</label>
				<textarea class="mt-2 form-control" name="livros" placeholder='livros' rows="5" id="comment"> {{ $cadastro->livros}}</textarea>
			</div>


			<div class="form-group">
				<label for="hobbies">hobbies</label>
				<textarea class="mt-2 form-control" name="hobbies" placeholder='hobbies' rows="5" id="comment"> {{ $cadastro->hobbies}}</textarea>
			</div>



			<div class="form-group">
				<label for="cursos_gostaria">Cursos que gostaria de fazer</label>
				<textarea class="mt-2 form-control" name="cursos_gostaria" placeholder='cursos que gostaria de fazer' rows="5" id="comment"> {{ $cadastro->cursos_gostaria}}</textarea>
			</div>



			@if(session()->has('experiencia-fail'))
			<div class="alert alert-danger alert-dismissible py-3 mr-4">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h5>{{ session()->get('experiencia-fail') }}</h5>
			</div>
			@endif

			<div class="form-horizontal">
				<fieldset>
					<!-- Form Name -->
					<label for="hobbies" style="font-size: 22px">Experiências profissionais</label>
					<!-- Text input-->
					<div id="items" class="form-group">
						@foreach($experiencias as $experiencia)
						<div class="col-md-8 margin-bottom">
							<hr class="mb-5">
							<div class="form-group">

								<label class=" control-label" for="textinput">Nome da empresa</label>
								<a class="btn btn-danger float-right mb-3"  href="{{route('deletar.experiencia',$experiencia->id)}}">Deletar</a>
								<p>{{$experiencia->nome_empresa}}</p>

								<label class=" control-label" for="textinput">Cargo</label>
								<p>{{ $experiencia->cargo}}</p>

								<label class=" control-label" for="textinput">Data de inicio</label>
								<p>{{ Carbon\Carbon::parse($experiencia->inicio)->format('d/m/Y') }}</p>

								<label class=" control-label" for="textinput">Conclusão</label>
								<p>{{ Carbon\Carbon::parse($experiencia->conclusao)->format('d/m/Y') }}</p>

								<label class=" control-label" for="textinput">Descrição da vaga</label>
								<p>{{$experiencia->descricao}}</p>

							</div>
						</div>
						@endforeach
					</div>
				</fieldset>
			</div>

			<button id="add" class="add-more button-yellow uppercase btn btn-success m-2" type="button"> + Adicione mais uma experiência</button>
			<button class="delete button-white uppercase btn btn-danger  m-2" type="button"> - Remova uma experiência</button>

















			@if(session()->has('cursos-fail'))
			<div class="alert alert-danger alert-dismissible py-3 mr-4">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h5>{{ session()->get('cursos-fail') }}</h5>
			</div>
			@endif

			<div class="form-horizontal mt-5">
				<fieldset>
					<!-- Form Name -->
					<label for="hobbies-2" style="font-size: 22px">Cursos/Workshops/Certicações</label>
					<!-- Text input-->
					<div id="items-2" class="form-group">
						@foreach($cursos_candidatos as $experiencia)
						<div class="col-md-8 margin-bottom">
							<hr class="mb-5">
							<div class="form-group">

								<label class=" control-label" for="textinput">Curso</label>
								<a class="btn btn-danger float-right mb-3"  href="{{route('deletar.curso',$experiencia->id)}}">Deletar</a>
								<p>{{$experiencia->nome_curso}}</p>

								<label class=" control-label" for="textinput">Nome da instituição</label>
								<p>{{ $experiencia->nome_instituicao}}</p>

								<label class=" control-label" for="textinput">Grau</label>
								<p>{{ $experiencia->grau}}</p>


								<label class=" control-label" for="textinput">Data de inicio</label>
								<p>{{ Carbon\Carbon::parse($experiencia->inicio)->format('d/m/Y') }}</p>

								<label class=" control-label" for="textinput">Conclusão</label>
								<p>{{ Carbon\Carbon::parse($experiencia->conclusao)->format('d/m/Y') }}</p>

								<label class=" control-label" for="textinput">Observação</label>
								<p>{{$experiencia->observacao}}</p>

							</div>
						</div>
						@endforeach
					</div>
				</fieldset>
			</div>

			<button id="add-2" class="add-more-2 button-yellow uppercase btn btn-success m-2" type="button"> + Adicione mais um curso</button>
			<button class="delete-2 button-white uppercase btn btn-danger  m-2" type="button"> - Remova um curso</button>




			<div class="row mt-5">
				<div class="col">
					<button type="submit" class="btn btn-primary mb-5">Salvar</button>
				</div>
			</div>



			
		</form>

	</div>


	<div class="col-md-3">
		<div class="w-100 bg-dark" style="height: 500px">
			<p class="text-center">
				Banner
			</p>
		</div>

		<div class="w-100 bg-dark mt-5" style="height: 300px">
			<p class="text-center">
				Banner
			</p>
		</div>
	</div>


</div>

@stop