@extends('adminCandidato.base')


@section('titulo')
<title>Cacta Vagas - Dashboard</title>
@stop

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
crossorigin="anonymous">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/css/adminContrate/menu-admin.css')}}">
<link rel="stylesheet" href="{{asset('/css/layout-padrao.css')}}">
<link href="https://fonts.googleapis.com/css?family=Francois+One|Indie+Flower|Quicksand|Shadows+Into+Light&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/css/rodape.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
@stop


@section('conteudo')
<div class="container-fluid">
  <div class="row  p-0 m-0">
    <div class="col w p-0 m-0">
      <span class="text-right bem-vindo">Bem vindo!</span><br>
      <span class="text-right nome-empresa" style="">{{\Auth::user()->nome}}</span><br>
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



@if($cursos == 0 || $experiencias == 0)
<div class="container-fluid  py-0 my-0">
  <section class="my-3 py-3 vagas-destaque b">
    <p class="text-center"><i style="font-size: 64px; color: #ff9800" class="fas fa-exclamation-triangle"></i></p>
    <h2 class="text-center mb-3 title-page">Insira suas experiências e cursos</h2>
    <p class="text-left title-page">Insira suas experiência e cursos para aumentar suas chances. <a href="{{route('meu-perfil')}}/#add">Clique aqui.</a></p></p>
  </section>
</div>
@endif



<div class="container-fluid  py-0 my-0">
  <div class="row p-0 m-0">
    <div class="col mb-3">
      <p class="text-left title-page" >Overview</p>
      <hr class="line" style="">
    </div>
  </div>


  <div class="row">
    <div class="col-sm-4">
      <div class="row b m-1">
        <div class="col p-3">
          <p class="w">Perfil visualizado</p>
          <p class="total">{{ $total_visualizado}}</p>
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
      <p class="w">Suas candidaturas</p>
      <p class="total">{{$total_candidaturas}}</p>
    </div>
    <div class="col-md-4 p-0 m-0  d-none d-md-block">
     <div class="h-100 w-100">
      <div class="mx-auto w-50">
       <i  class=" g fas fa-star pt-5"></i>
     </div>
   </div>
 </div>
</div>
</div>
</div>

<!-- 
<div class="row mt-3">
  <div class="col mb-3">
    <p class="text-left  title-page">Novidades</p>
  </div>
</div>


<div class="row">
  <div class="col-md-12  mb-5">
    <div class="carousel slide" id="main-carousel" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#main-carousel" data-slide-to="1"></li>
        <li data-target="#main-carousel" data-slide-to="2"></li>
        <li data-target="#main-carousel" data-slide-to="3"></li>
      </ol>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block img-fluid" src="https://s19.postimg.cc/qzj5uncgj/slide1.jpg" alt="">
          <div class="carousel-caption  d-md-block">
            <h1>Mountain</h1>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="https://s19.postimg.cc/lmubh3h0j/slide2.jpg" alt="">
          <div class="carousel-caption  d-md-block">
            <h3>Mountain</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci esse vitae exercitationem fugit, numquam minus!</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="https://s19.postimg.cc/99hh9lr5v/slide3.jpg" alt="">
          <div class="carousel-caption  d-md-block">
            <h3>Mountain</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci esse vitae exercitationem fugit, numquam minus!</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="https://images.unsplash.com/photo-1496181832051-69dcf27fc27d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1489&q=80" alt="">
          <div class="carousel-caption  d-md-block">
            <h3>Mountain</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci esse vitae exercitationem fugit, numquam minus!</p>
          </div>
        </div>
      </div>

      <a href="#main-carousel" class="carousel-control-prev" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="sr-only" aria-hidden="true">Prev</span>
      </a>
      <a href="#main-carousel" class="carousel-control-next" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="sr-only" aria-hidden="true">Next</span>
      </a>
    </div>
  </div>
</div> -->





<section class="my-5 py-3 vagas-destaque b">
  <h2 class="text-center mb-3 title-page">Vagas recentes</h2>

  <div class="slider-vagas">
    @foreach($ultimas_vagas as $vagas)

    <a href="/vaga/{{$vagas->id}}/{{$vagas->slug}}">
      <div class="text-center vaga">

       <div class="img" style="height: 140px; background-image: url('/storage/{{$vagas->logo}}'); background-size: cover;
       background-repeat: round;">
     </div>
     <h4 class="pt-2 m-0"  style="font-size: 1em;font-family: 'Roboto Slab',sans-serif;font-weight: 600;">
       {{$vagas->titulo}}</h4>
       <p> {{$vagas->localidade}},
        {{$vagas->uf}}</p>

      </div>
    </a>
    @endforeach
  </div>

  <p class="w text-center">Encontre mais vagas clicando <a href="{{route('site.lista-vaga')}}">aqui.</a></p>
</section>


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
<script src="{{asset('js/slick.js')}}"></script>
@stop

