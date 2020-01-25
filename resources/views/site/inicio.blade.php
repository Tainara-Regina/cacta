<!DOCTYPE html>
<html lang="pt">
<head> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="cacta">
  <title>{!!$procurar_vaga->title!!}</title>

  <!-- Bootstrap core CSS -->
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
</head>


<body>
    @include('site.includes.menu-mobile')
    <main role="main">
        <section class="jumbotron text-center parallax" style="background-image: url({{ Voyager::image( $fundo_vaga->imagem) }});">
          <div class="text-left  d-none d-sm-block">
           <a class="btn mb-5 cadastre animated rubberBand btn-cadastre-se">cadastre-se clicando aqui</a>
       </div>

       <div  class="container encontre-servico">
          <h2 class="mb-3">{!!$procurar_vaga->titulo!!}</h2>
          <div class="form-row">
              <div class="col px-5  has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input id="buscar"  type="text" class="form-control busca mx-auto" placeholder="Pesquise aqui. Ex: barbeiro, fotografo, barman,etc.">
                {!!$procurar_vaga->subtitulo_1!!}
                {!!$procurar_vaga->subtitulo_2!!}
            </div>
        </div>
    </div>
    <p class="m-0 p-0 text-right d-none d-sm-block" style="color: #fff"><i>{!!$fundo_vaga->titulo!!}</i></p>
</section>
@include('site.includes.menu')





<section class="conteudo-pesquisa" >
    <div id="filtro" class="d-none">
        <div class="container-fluid" style="background-color: #eeeeeeb3;">
          <div class="row">

            <div class="col-md-2">
                <h5 class="text-center mt-2 mt-sm-5">Encontramos: <b>332</b> vagas.</h5>
            </div>

            <div class="col-md-2 text-center">
                <p class="form-check-label mt-2 mt-sm-4 mb-2" for="inlineCheckbox1"><b>Onde?</b></p>
                <input type="text" class="form-control" id="" placeholder="Ex: São Paulo, Zona Sul" name="">
                <div class="form-check-inline  d-sm-none">
                  <label class="form-check-label">
                    <input id="filtrar" type="checkbox" class="form-check-input my-3" value=""> <strong>Deseja filtrar a busca?</strong> 
                </label>
            </div>
        </div>

        <div class="col-md-8 mt-2 table-responsive">
            <!-- desktop -->
            <table class="table d-none d-sm-block">
              <tbody>
                <tr style="line-height: 67px;">
                  <td style="line-height: 18px;"><b>Estou procurando:</b></td>
                  <td>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                      <label class="form-check-label" for="inlineCheckbox1">Fixo</label>
                  </div>
              </td>
              <td>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                  <label class="form-check-label" for="inlineCheckbox1">Temporario</label>
              </div>
          </td>

          <td></td>
      </tr>
      <tr>
          <td><b>Area:</b></td>
          <td>
             <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
              <label class="form-check-label" for="inlineCheckbox1">Barbeiro(a)</label>
          </div>
      </td>
      <td>
       <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
          <label class="form-check-label" for="inlineCheckbox1">Tatuador(a)</label>
      </div>
  </td>

  <td>
   <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
      <label class="form-check-label" for="inlineCheckbox1">Cozinheiro(a)</label>
  </div>
</td>
</tr>
<tr>
  <td style="border-top: unset;"></td>
  <td style="border-top: unset;"> 
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
      <label class="form-check-label" for="inlineCheckbox1">Fotográfo(a)</label>
  </div>
</td>
<td style="border-top: unset;">
 <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
  <label class="form-check-label" for="inlineCheckbox1">Bartender</label>
</div>
</td>
<td style="border-top: unset;">
 <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
  <label class="form-check-label" for="inlineCheckbox1">Musico(a)</label>
</div>
</td>

</tr>
</tbody>
</table>



<!-- mobile -->
<table class="table  d-sm-none" style="display: none" id="filtro-mobile">
  <tbody>
    <tr style="line-height: 67px;">
      <td style="line-height: 18px;"><b>Estou procurando:</b></td>
      <td>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
          <label class="form-check-label" for="inlineCheckbox1">Fixo</label>
      </div>
  </td>
  <td>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
      <label class="form-check-label" for="inlineCheckbox1">Temporario</label>
  </div>
</td>

</tr>
<tr>
  <td><b>Area:</b></td>
  <td>
     <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
      <label class="form-check-label" for="inlineCheckbox1">Barbeiro(a)</label>
  </div>
</td>
<td>
   <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
      <label class="form-check-label" for="inlineCheckbox1">Tatuador(a)</label>
  </div>
</td>
</tr>
<tr>
  <td style="border-top: unset;"></td>
  <td style="border-top: unset;"> 
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
      <label class="form-check-label" for="inlineCheckbox1">Fotográfo(a)</label>
  </div>
</td>
<td style="border-top: unset;">
 <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
  <label class="form-check-label" for="inlineCheckbox1">Bartender</label>
</div>
</td>
</tr>



<tr>
    <td style="border-top: unset;"></td>
    <td style="border-top: unset;">
       <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
          <label class="form-check-label" for="inlineCheckbox1">Cozinheiro(a)</label>
      </div>
  </td>
  <td style="border-top: unset;">
     <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
      <label class="form-check-label" for="inlineCheckbox1">Músico(a)</label>
  </div>
</td>  
</tr>



</tbody>
</table>



</div>

</div>
</div>

<div class="container vagas">
   <a href="{{route('site.vaga')}}">
    <div class="row text-center py-3" style="border-bottom: 1px solid #bdbdbd">
        <div class="col d-none d-sm-block"><img width="125px" src="https://cdn.pixabay.com/photo/2018/04/05/02/52/room-3291779__340.jpg">  
        </div>

        <div class="col">
           <p><b>Barbeiro</b></p>
           <p>Barbearia Dona Navalha</p>  
       </div>

       <div class="col">
          <p><b>Fixo</b></p>
          <p>São Paulo</p> 
      </div>

      <div class="col mt-4">
         <p class="vaga-destaque">Destaque</p>
     </div>
 </div>
</a>

<a href="{{route('site.vaga')}}">
    <div class="row text-center py-3" style="border-bottom: 1px solid #bdbdbd">
        <div class="col d-none d-sm-block"><img width="125px" src="https://cdn.pixabay.com/photo/2018/04/05/02/52/room-3291779__340.jpg">  
        </div>

        <div class="col">
           <p><b>Barbeiro</b></p>
           <p>Barbearia Dona Navalha</p>  
       </div>

       <div class="col">
          <p><b>Fixo</b></p>
          <p>São Paulo</p> 
      </div>

      <div class="col mt-4">
         <p class="vaga-destaque">Destaque</p>
     </div>
 </div>
</a>


 <!-- <table class="table text-center">
    <tbody>
      <tr>
        <td class="d-none d-sm-block"><img width="125px" src="https://cdn.pixabay.com/photo/2018/04/05/02/52/room-3291779__340.jpg"></td>
        <td>
            <p><b>Barbeiro</b></p>
            <p>Barbearia Dona Navalha</p>
        </td>
        <td>
            <p><b>Fixo</b></p>
            <p>São Paulo</p>
        </td>
        <td>
            <p class="vaga-destaque">Destaque</p>
        </td>
    </tr>
</tbody>
</table> -->
</div>



<div class="col text-center">
    <a class="btn my-3 cadastre animated rubberBand btn-cadastre-se" href="{{route('site.lista-vaga')}}">Ver mais vagas</a>
</div>


</div>
</section>



<section style="background-color: #fccb07">
    <div class="container">
        <div class="row">
            <div class="col text-center pt-4 pb-5">
               <a class="btn mb-3 cadastre animated rubberBand btn-experimente">Cadastre-se aqui</a>
               <h4 class="text-center cadastre-se-mobile">Cadastre-se e fique disponivel para varias empresas. <strong>É de graça!</strong></h4>
           </div>
       </div>
   </div>
</section>




<section class="contratando">
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
        <a class="btn mb-5 cadastre animated rubberBand btn-experimente">Clique aqui e experimente grátis!</a>
    </div>
</div>

</div>
</section>

<section class="blog text-center">
  <a class="navbar-brand mx-auto text-center" href="#"> <img style="height: 50px;" src="https://image.flaticon.com/icons/png/512/43/43369.png"> 
   <p style="color:black;font-family: 'Shadows Into Light', cursive;" class="text-center mb-0 pb-0 logo">Cacta blog</p>
</a>


<div class="slider">
  <div class="m-0 p-0" style='height: 338px;background-image: url("https://cdn.pixabay.com/photo/2017/08/06/09/32/people-2590677__340.jpg")'>
    <a target="_blank"   href="#">
      <div class="background" ></div>
      <div class="text">
        <span class="category">CATEGORIA</span>
        <h3>
          Titulo do Post
      </h3>
  </div>
</a>
</div>


<div class="m-0 p-0" style='height: 338px;background-image: url("https://cdn.pixabay.com/photo/2015/01/21/14/14/apple-606761__340.jpg")'>
    <a target="_blank"   href="#">
      <div class="background" ></div>
      <div class="text">
        <span class="category">CATEGORIA</span>
        <h3>
          Titulo do Post
      </h3>
  </div>
</a>
</div>


<div class="m-0 p-0" style='height: 338px;background-image: url("https://cdn.pixabay.com/photo/2017/08/07/19/48/guy-2607136__340.jpg")'>
    <a target="_blank"   href="#">
      <div class="background" ></div>
      <div class="text">
        <span class="category">CATEGORIA</span>
        <h3>
          Titulo do Post
      </h3>
  </div>
</a>
</div>

<div class="m-0 p-0" style='height: 338px; background-image: url("https://cdn.pixabay.com/photo/2019/12/02/05/54/bartender-4666995__340.jpg")'>
    <a target="_blank"   href="#">
      <div class="background" ></div>
      <div class="text">
        <span class="category">CATEGORIA</span>
        <h3>
          Titulo do Post
      </h3>
  </div>
</a>
</div>


<div class="m-0 p-0" style='height: 338px;background-image: url("https://cdn.pixabay.com/photo/2015/09/05/20/14/guy-925008__340.jpg")'>
    <a target="_blank"   href="#">
      <div class="background" ></div>
      <div class="text">
        <span class="category">CATEGORIA</span>
        <h3>
          Titulo do Post
      </h3>
  </div>
</a>
</div>
</section>


<section class="mt-5 vagas-destaque">
  <h2 class="text-center mb-5 titulo">Vagas recentes</h2>

  <div class="slider-vagas">

   <div class="text-center vaga">
     <div class="img" style="background-image: url('https://www.maggiesadler.com/wp-content/uploads/2015/10/1168617_1435408473368301_409182770_n.jpg');">
     </div>
     <h4 class="pt-2 m-0"  style="font-size: 1em;font-family: 'Roboto Slab',sans-serif;font-weight: 600;">
     Barbeiro</h4>
     <p>São Paulo,SP</p>
 </div>


 <div class="text-center vaga">
    <div class="img" style="background-image: url('https://cdn.pixabay.com/photo/2015/09/23/22/24/tattoo-expo-954463__340.jpg');">
    </div>
    <h4 class="pt-2 m-0"  style="font-size: 1em;font-family: 'Roboto Slab',sans-serif;font-weight: 600;">
    Tatuador</h4>
    <p>São Paulo,SP</p>
</div>


<div class="text-center vaga">
   <div class="img" style="background-image: url('https://www.maggiesadler.com/wp-content/uploads/2015/10/1168617_1435408473368301_409182770_n.jpg');">
   </div>
   <h4 class="pt-2 m-0"  style="font-size: 1em;font-family: 'Roboto Slab',sans-serif;font-weight: 600;">
   Barbeiro</h4>
   <p>São Paulo,SP</p>
</div>


<div class="text-center vaga">
   <div class="img" style="background-image: url('https://www.maggiesadler.com/wp-content/uploads/2015/10/1168617_1435408473368301_409182770_n.jpg');">
   </div>
   <h4 class="pt-2 m-0"  style="font-size: 1em;font-family: 'Roboto Slab',sans-serif;font-weight: 600;">
   Fotografo</h4>
   <p>São Paulo,SP</p>
</div>

<div class="text-center vaga">
  <div class="img" style="background-image: url('https://cdn.pixabay.com/photo/2018/04/05/02/52/room-3291779__340.jpg');">
  </div>
  <h4 class="pt-2 m-0"  style="font-size: 1em;font-family: 'Roboto Slab',sans-serif;font-weight: 600;">
  Barbeiro</h4>
  <p>São Paulo,SP</p>
</div>

<div class="text-center vaga">
 <div class="img" style="background-image: url('https://www.maggiesadler.com/wp-content/uploads/2015/10/1168617_1435408473368301_409182770_n.jpg');">
 </div>
 <h4 class="pt-2 m-0"  style="font-size: 1em;font-family: 'Roboto Slab',sans-serif;font-weight: 600;">
 Barbeiro</h4>
 <p>São Paulo,SP</p>
</div>
</div>
</section>
<!-- future include -->
</main>






@include('site.includes.rodape')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{asset('js/slick.js')}}"></script>
<script src="{{asset('js/home.js')}}"></script>


</body>
</html>




