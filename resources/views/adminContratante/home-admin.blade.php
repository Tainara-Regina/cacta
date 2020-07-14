@extends('adminContratante.base')


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
      <span class="text-right bem-vindo">Bem vindo!</span><br>
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
  <div class="row p-0 m-0">
    <div class="col mb-3">
      <p class="text-left title-page" >Sobre suas vagas</p>
      <hr class="line" style="">
    </div>
  </div>

  <div class="row">
    <a href="{{route('site.candidatos-vaga')}}">
    <div class="col-sm-4">
      <div class="row b m-1">
        <div class="col p-3">
          <p class="w">Total de vagas cadastradas</p>
          <p class="total">{{$vagas_total}}<span>/ {{$total_vaga_plano->quantidade_vagas}}</span></p>
        </div>
        <div class="col-md-4 p-0 m-0  d-none d-md-block">
         <div class="h-100 w-100">
          <div class="mx-auto w-50">
           <i  class=" g fas fa-briefcase pt-5"></i>
         </div>
       </div>
     </div>
   </div>
    </a>
 </div>





 <div class="col-sm-4">
   <a href="{{route('site.candidatos-vaga')}}">
  <div class="row b m-1">
    <div class="col p-3">
      <p class="w">Total de interessados em suas vagas</p>
      <p class="total"> {{$candidatos_total}} </p>
    </div>
    <div class="col-md-4 p-0 m-0  d-none d-md-block">
     <div class="h-100 w-100">
      <div class="mx-auto w-50">
       <i class="fas fa-users g pt-5"></i>
     </div>
   </div>
 </div>
</div>
</a>
</div>



<div class="col-sm-4">
   <a href="{{route('site.candidatos-vaga')}}">
  <div class="row b m-1">
    <div class="col p-3">
      <p class="w">Total de vagas em destaque</p>
      <p class="total">{{$vagas_em_destaque}}<span>/{{$total_destaque_plano->vagas_em_destaque}}</span></p>
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
</a>
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
</div>
-->


<div class="row mt-3 mb-5">
 <div class="col">
  <div class="row b m-1">
    <div class="col p-3">
      <p class="w">Últimos candidadatos cadastrados</p>
      <table class="table">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Data de cadastro</th>
            <th>Vaga</th>
            <th>Detalhes</th>
          </tr>
        </thead>
        <tbody>



          @foreach($candidatos_das_vagas as $candidatos)
          <tr>
            <td>{{$candidatos->nome}}</td>
            <td>{{ Carbon\Carbon::parse($candidatos->canditatura_em)->format('d/m/Y')}}</td>


            <td>
              {{$candidatos->titulo}}                
            </td>

            <td>
              <a href="{{route('site.detalhes-candidato',['id_candidato' => $candidatos->candidato_id ,'id_vaga' => $candidatos->vaga_id ])}}">Ver candidato(a)
                <i style="color: #754026" class="fas fa-arrow-right float-right"></i>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="col-md-4  p-3 m-0">
        <div class="h-100 w-100" style="">
          <div class="mx-auto">
           <p class="w p-5">Visualize todas suas vagas e candidatos clicando <a href="{{route('site.candidatos-vaga')}}">aqui.</a></p>
         </div>
       </div>
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

