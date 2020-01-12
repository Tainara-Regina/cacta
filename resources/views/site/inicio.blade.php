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
  <meta name="theme-color" content="#563d7c">
  <link rel="stylesheet" href="{{asset('/css/inicio.css')}}">
  <link rel="stylesheet" href="{{asset('/css/menu.css')}}">
  <link rel="stylesheet" href="{{asset('/css/rodape.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Francois+One|Indie+Flower|Quicksand|Shadows+Into+Light&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Kulim+Park&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
</head>




<body>
  <main role="main">
    <section class="jumbotron text-center parallax" style="background-image: url({{ Voyager::image( $fundo_vaga->imagem) }});">
      <div class="text-left">
       <a style="    background-color: #fff;
       font-weight: 700;
       color: #000000;
       font-size: 17px;
       text-transform: uppercase;
       box-shadow: 10px 10px 25px -7px rgba(0,0,0,0.59);
       padding: 8px 25px;
       font-family: 'Kulim Park', sans-serif;" class="btn mb-5 cadastre animated rubberBand">cadastre-se clicando aqui</a>
   </div>

   <div  class="container encontre-servico">
      <h2 class="mb-3">{!!$procurar_vaga->titulo!!}</h2>
      <form>
        <div class="form-row">
          <div class="col">
            <input id="buscar"  type="text" style="width: 60%" class="form-control busca mx-auto" placeholder="Pesquise aqui. Ex: barbeiro, fotografo, barman,etc.">
            {!!$procurar_vaga->subtitulo_1!!}
            {!!$procurar_vaga->subtitulo_2!!}
        </div>
    </div>
</form>
</div>
<p class="float-right" style="color: #fff"><i>{!!$fundo_vaga->titulo!!}</i></p>
</section>
@include('site.includes.menu')


<section class="conteudo-pesquisa" >
    <div id="filtro" class="d-none">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-7 mt-2 table-responsive">
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














<table class="table d-block d-sm-none">
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
      <label class="form-check-label" for="inlineCheckbox1">Musico(a)</label>
  </div>
</td>  
</tr>



</tbody>
</table>



</div>


<div class="col-md-2 text-center">
    <p class="form-check-label mt-4 mb-2" for="inlineCheckbox1"><b>Onde?</b></p>
    <input type="text" class="form-control" id="" placeholder="Ex: São Paulo, Zona Sul" name="">
</div>


<div class="col-md-2">
    <p class="text-center mt-5">Encontramos: <b>332</b> vagas.</p>
</div>


</div>
</div>


<div class="container mt-5">
 <table class="table text-center">
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
            <p style="background-color: green;color: #fff;border-radius: 10px;padding: 0px 15px;">Destaque</p>
        </td>
    </tr>


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
            <p style="background-color: green;color: #fff;border-radius: 10px;padding: 0px 15px;">Destaque</p>
        </td>
    </tr>


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
            <p style="background-color: green;color: #fff;border-radius: 10px;padding: 0px 15px;">Destaque</p>
        </td>
    </tr>

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
            <p style="background-color: green;color: #fff;border-radius: 10px;padding: 0px 15px;">Destaque</p>
        </td>
    </tr>

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
            <p style="background-color: green;color: #fff;border-radius: 10px;padding: 0px 15px;">Destaque</p>
        </td>
    </tr>
</tbody>
</table>
</div>



<div class="col text-center">
    <a style="    background-color: #fff;
    font-weight: 700;
    color: #000000;
    font-size: 17px;
    text-transform: uppercase;
    box-shadow: 10px 10px 25px -7px rgba(0,0,0,0.59);
    padding: 8px 25px;
    font-family: 'Kulim Park', sans-serif;" class="btn mb-5 cadastre animated rubberBand">Ver mais vagas</a>
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


  <div class="row text-center my-5">
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
  <h2 class="text-center mb-5 titulo">Vagas em destaque</h2>

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

<!-- 
<section style="background-size: cover;background-image:url(https://cdn.pixabay.com/photo/2017/01/14/12/58/barber-1979440_960_720.jpg);">
    <div class="container">
        <div class="row" style="max-width: 700px;margin: auto;">
         <div class="col text-center">
            <h4>Album</h4>
            <h1>Cursos</h1>
            <p>Potencializamos carreiras desenvolvendo indivíduos com habilidades e conhecimentos contemporâneos na velocidade que o mercado exige.</p>
            <h2 style="font-size: 24px;font-family:'Roboto Slab',serif;
            color: #fff;margin-bottom: 10px;letter-spacing: 1px;text-shadow: 0 2px #000;">Próximos cursos</h2>
        </div> 
    </div>


    <section class="mt-5">
        <div style="color: #fff" class="slider-cursos">

         <div class="text-center bg">
             <h3 class="pt-2 m-0 titulo">
             Tecnicas de corte na tesoura</h3>
             <h4 class="subtitulo">Algumas tecnicas e penteados</h4>
             <h5 class="data">10 de Fevereiro</h5>
             <a class="btn" href="">SAIBA MAIS</a>
         </div>

     </div>

     <div class="row">
        <div class="col text-center mb-5">
            <a href="" class="btn-veja-mais">VEJA TODOS OS CURSOS</a>
        </div>
    </div>
</section>
</div>
</section> -->
</main>






@include('site.includes.rodape')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{asset('js/slick.js')}}"></script>



<script>
  $(document).ready(function(){
    $("#buscar").focus(function(){
      $("#topNav").removeClass("sticky-top");
      $("#topNav").addClass("fixed-top");
  });


    $("#buscar").keyup(function(){
      $("#filtro").addClass("d-block");
      $(".conteudo-pesquisa").css("height","100%");

  });


});
</script>


</body>
</html>




