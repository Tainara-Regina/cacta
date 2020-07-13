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

				<p>Termo de cancelamento do site cactavagas.com  </p>

<p>O cactavagas.com exige que você forneça seus dados de pagamento para iniciar dias gratuitos. Ao fornecer esses detalhes, você concorda que podemos começar a cobra-lo automaticamente por um plano no primeiro dia seguinte ao fim do cactavagas.com, em uma base mensal recorrente, ou outro intervalo que antecipadamente divulgarmos para você. SE VOCÊ NÃO DESEJAR ESSA COBRANÇA, VOCÊ DEVE CANCELAR/DESATIVAR SEU CADASTRO ANTES DO FIM DOS DIAS GRATUITOS DO PLANO. Para efetuar o cancelamento, faça o login com o seu cadastro, acesse a opção “opções” do menu para desativar. </p>

<p>Se você não cancelar o cadastro antes do fim dos dias gratuitos de algum plano que disponibilize, você autoriza o cactavagas.com a cobra-lo mensalmente o preço acordado, até que você efetue o cancelamento (desativar o cadastro).</p>

<p>Quando você cancela/desativa seu cadastro, ele ficará inativo no mínimo 60 dias. Após este período, caso o cadastro não seja reativado no intervalo de 60 dias, ele será excluído permanentemente da nossa base, sem chances de recuperar os dados.</p>

<p>Caso efetue o cancelamento no cactavagas.com (desativar o cadastro) de algum plano que tenha dias gratuito, quando reativar, o plano não terá dias gratuitos novamente (mesmo que não tenha utilizado todos os dias gratuitos anteriormente). </p>

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





