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
<title>{!!$procurar_vaga->title!!}</title>
@stop

@section('conteudo')
<main role="main">
  <section class="text-center parallax" 

  @if(isset($fundo_vaga->imagem))
  style="background-image: url({{ Voyager::image( $fundo_vaga->imagem) }});
  @endif
  ">

  <div class="text-left  d-none d-sm-block">
    <!-- A grey horizontal navbar that becomes vertical on small screens -->
    <nav class="navbar navbar-expand-sm p-0 m-0 menu-top">
      <!-- Links -->
      <ul class="navbar-nav"> 

        <li class="nav-item active">
          <a class="nav-link" href="{{route('site.lista-vaga')}}">Vagas</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('formularioCandidato')}}">Cadastre-se </a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="{{route('formularioContratante')}}">Contrate</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('blog-home')}}">Cacta Vagas Blog</a>
        </li>


        <li class="nav-item dropdown">

          @if(Request::session()->get('menu_contratante'))
          <a class="nav-link" href="{{route('site.admin-contratante')}}" id="navbarDropdown" >
            <b style="color: green">Acessar painel</b>
          </a>



          @elseif(Request::session()->get('menu_candidato'))
          <a class="nav-link" href="{{route('site.admin-candidato')}}" id="navbarDropdown" >
            <b style="color: green">Acessar painel</b>
          </a>


          @else
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <b>Entrar</b>
          </a>


          <div class="dropdown-menu dropdown-menu-2" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalCandidato">Área do candidato</a>
            <div class="dropdown-divider" style="border-top: 1px solid green;"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalContratante">Área do contratante</a>
          </div>
          @endif
        </li>


      </ul>
    </nav>
  </div>


  <div  class="container encontre-servico">
    <h2 class="mb-3">{!!$procurar_vaga->titulo!!}</h2>
    <div class="form-row">
      <div class="col px-5  has-search">
        <span class="fa fa-search form-control-feedback"></span>
        <input id="buscar"  name="buscar"  type="text" class="form-control busca mx-auto" placeholder="Pesquise aqui. Ex: barbeiro, fotografo, barman,etc.">
        {!!$procurar_vaga->subtitulo_1!!}
        {!!$procurar_vaga->subtitulo_2!!}
      </div>
    </div>
  </div>


  <p class="m-0 p-0 text-right d-none d-sm-block" style="color: #fff"><i>
    @if(isset($fundo_vaga->imagem))
    {!!$fundo_vaga->titulo!!}
    @endif
  </i></p>
</section>

@include('site.includes.menu')


<section class="conteudo-pesquisa">
  <div id="filtro" class="d-none">
    <div class="container-fluid" style="background-color: #eeeeeeb3;">
      <div class="row">

        <div class="col-md-2">
          <h5 id="encontramos" class="text-center mt-2 mt-sm-5">Carregando...</h5>
        </div>

        <div class="col-md-2 text-center">
          <p class="form-check-label mt-2 mt-sm-4 mb-2" for="inlineCheckbox1"><b>Onde?</b></p>
          <input type="text" class="form-control" placeholder="Ex: São Paulo, Zona Sul" id="local" name="local">
          <div class="form-check-inline  d-sm-none">
            <label class="form-check-label">
              <input id="filtrar" type="checkbox" class="form-check-input my-3" value=""> <strong>Deseja filtrar a busca?</strong> 
            </label>
          </div>
        </div>

        <div class="col-md-8 mt-2 table-responsive">
          <!-- desktop -->
          <div class="d-none d-sm-block filtro">
            <div class="row py-3" style="line-height: 67px;">
              <span style=""><b>Estou procurando:</b></span>
              <div class="form-check form-check-inline col">
                <ul>
                  <li><input class="form-check-input" type="checkbox" name="regime[]" id="inlineCheckbox1" value="fixo">
                    <label class="form-check-label"  for="inlineCheckbox1">Fixo</label>
                  </li>
                  <li>
                   <input class="form-check-input" name="regime[]" type="checkbox" id="inlineCheckbox1" value="temporario">
                   <label class="form-check-label" for="inlineCheckbox1">Temporario</label>
                 </li>
               </ul>
             </div>
           </div>


           <div class="row py-3">
            <td>
              <b>Onde você quer trabalhar?</b>
            </td>
            <div class="form-check form-check-inline col-md-6 pb-3">

              <ul class="flex-container">

                @foreach($segmentos as $segmento)
                <li class="pb-3">
                  <input class="form-check-input" name="area[]" type="checkbox" id="inlineCheckbox1" value="{{$segmento->id}}">
                  <label class="form-check-label" for="inlineCheckbox1">{{$segmento->segmento}}</label>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>



        <!-- mobile -->
          <div class="table pl-2 d-sm-none filtro" style="display: none" id="filtro-mobile">
            <div class="row py-3" style="line-height: 15px;">
              <span style=""><b>Estou procurando:</b></span>
              <div class="form-check form-check-inline col">
                <ul>
                  <li><input class="form-check-input" type="checkbox" name="regime[]" id="inlineCheckbox1" value="fixo">
                    <label class="form-check-label text-center"  for="inlineCheckbox1">Fixo</label>
                  </li>
                  <li>
                   <input class="form-check-input  text-cente" name="regime[]" type="checkbox" id="inlineCheckbox1" value="temporario">
                   <label class="form-check-label" for="inlineCheckbox1">Temporario</label>
                 </li>
               </ul>
             </div>
           </div>


           <div class="row py-3">
            <td>
              <b>Onde você quer trabalhar?</b>
            </td>
            <div class="form-check form-check-inline col-md-6 pb-3 pt-3">

              <ul class="flex-container">

                @foreach($segmentos as $segmento)
                <li class="pb-3">
                  <input class="form-check-input" name="area[]" type="checkbox" id="inlineCheckbox1" value="{{$segmento->id}}">
                  <label class="form-check-label" for="inlineCheckbox1">{{$segmento->segmento}}</label>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
     

    </div>
  </div>
</div>

<div class="container vagas"></div>

<div class="col text-center">
  <a class="btn my-3 cadastre animated rubberBand btn-cadastre-se" href="{{route('site.lista-vaga')}}">Carregar mais vagas!</a>
</div>

</div>
</section>


<section>
  <div class="container">
    <div class="row">
      <div class="col text-center pt-4 pb-5">
       <a class="btn mb-3 cadastre animated rubberBand btn-experimente" href="{{route('formularioCandidato')}}">Cadastre-se aqui</a>
       <h4 class="text-center cadastre-se-mobile">Cadastre-se e fique disponível para várias empresas. <strong>É de graça!</strong></h4>
     </div>
   </div>
 </div>
</section>




<section class="contratando" id="contratar">
  <div class="container">
    <div class="row">
      <div class="col text-center py-4 titulo">
        <h2>{!!$contratar->titulo!!}</h2>
        <p>{!!$contratar->texto!!}
        </p>
      </div>
    </div>


    <div class="row text-center my-3">
      <div class="col-md-4">
        <div class="box-item p-3">
         {!!$contratar->box_1!!}
       </div>
     </div>
     <div class="col-md-4">
      <div class="box-item p-3">
       {!!$contratar->box_2!!}
     </div>
   </div>
   <div class="col-md-4">
    <div class="box-item p-3">
     {!!$contratar->box_3!!}
   </div>
 </div>
</div>

<div class="row">
  <div class="col text-center">
    <a class="btn mb-5 cadastre animated rubberBand btn-experimente"  href="{{route('formularioContratante')}}">Clique aqui e comece a contratar grátis!</a>
  </div>
</div>

</div>
</section>

<section class="blog text-center">
  <a class="navbar-brand mx-auto text-center" href="#"> <img style="height: 50px;" src="{{asset('/img/logo_cacta.png')}}"> 
   <p style="color:black;font-family: 'Shadows Into Light', cursive;" class="text-center mb-0 pb-0 logo">Cacta Vagas Blog</p>
 </a>


 <div class="slider">





   @foreach($ultimos_posts as $ultimo_post)
   <div class="m-0 p-0" style='height: 338px;background-image: url("{{Voyager::image($ultimo_post->image)}}")'>
    <a target="_blank"   href="{{route('post',$ultimo_post->slug)}}">
      <div class="background" >
      </div>
      <div class="text">
        <span class="category">{{$ultimo_post->name}}</span>
        <h3>
          {{$ultimo_post->title}}
        </h3>
      </div>
    </a>
  </div>
  @endforeach  
</section>


<section class="mt-5 vagas-destaque">
  <h2 class="text-center mb-5 titulo">Vagas recentes</h2>

  <div class="slider-vagas">

    @foreach($ultimas_vagas as $vagas)
    <a href="/vaga/{{$vagas->id}}/{{$vagas->slug}}">
      <div class="text-center vaga">

       <div class="img" style="background-image: url('storage/{{$vagas->logo}}');">
       </div>
       <h4 class="pt-2 m-0"  style="font-size: 1em;font-family: 'Roboto Slab',sans-serif;font-weight: 600;">
         {{$vagas->titulo}}</h4>
         <p> {{$vagas->localidade}},
          {{$vagas->uf}}</p>

        </div>
      </a>
      @endforeach
    </div>
  </section>
  <!-- future include -->
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
@stop