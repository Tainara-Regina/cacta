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
<script src="{{asset('/js/mascaras.js')}}"></script>
@stop


@section('titulo')
<title>Cacta Vagas - Cadastre e encontre uma vaga</title>
@stop

@section('conteudo')
<main role="main">
	@include('site.includes.menu')
	
	<div class="container">
		<div class="row">
			<div class="col mt-5 col-10 mx-auto">

				<p>				Termo de uso do site cactavagas.com  </p>




				<p>O objetivo do site cactavagas.com é fazer a “ponte” do empregador com quem está em busca de  vaga de emprego. </p>

				<p>O cactavagas.com faz a relação de profissionais candidatos com empresas que divulgam suas vagas de emprego no site. </p> 

				<p>O cactavagas.com apenas possibilita a divulgação das vagas e não se responsabiliza pela vaga divulgada. </p>

				<p>As vagas divulgadas são de total responsabilidade do usuário que a divulgou (cadastrou e disponibilizou no site cactavagas.com) e não do cactavagas.com. </p>

				<p>Todas as informações inseridas no cadastro do usuário e sua veracidade são de responsabilidade do próprio usuário que efetuou o cadastro, principalmente dados pessoais (isso se aplica a todos os usuários). </p>

				<p>O cactavagas.com não se responsabiliza pela veracidade dos dados inseridos por usuários, sendo contratante ou candidato. </p>

				<p>Concluir o cadastro como contratante torna o usuário um contratante e concluir o cadastro como candidato torna o usuário um candidato. </p>

				<p>Os dados de usuário cadastrados como candidato poderão ser visualizados por usuários cadastrados como contratante (somente os dados relevantes para a vaga, dados pessoais nunca serão expostos). </p>

				<p>O site pode ser modificado sem prévio aviso. </p>

				<p>O site pode ser desativado e ou modificado em qualquer tempo por seus criadores.  </p>

				<p>Todos os planos podem ser alterados por seus criadores a qualquer momento. </p>

				<p>O plano pago pode ter um período determinado para a utilização. Quando o período acabar, o usuário poderá optar por um plano pago para continuar utilizando a plataforma. </p>

				<p>O plano gratuito pode se tornar pago a qualquer momento(sem aviso prévio), caso o usuário não efetue a contratação do plano pago, seu acesso será bloqueado.  </p>

				<p>Ao deletar o cadastro, todos os dados relacionados ao usuário serão excluídos permanentemente sem chance de recuperação. 
				</p>

				<p>O cactavagas.com não tem a obrigação de abranger todas as categorias de vaga. </p>

				<p>
				As categorias de vagas disponíveis podem ser acrescentadas ou removidas a qualquer momento por seus criadores. 	
				</p>
<p>Os planos do cactavagas.com poderão, de tempos em tempo, ter alterações no valor. </p>
			</div>
		</div>
	</div>

</main>
@stop




@section('rodape')
@include('site.includes.rodape')
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
@stop





