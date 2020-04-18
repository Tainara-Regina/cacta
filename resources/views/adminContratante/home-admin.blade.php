<!DOCTYPE html>
<html lang="pt">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cacta - Admin Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	crossorigin="anonymous">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/css/adminContrate/menu-admin.css')}}">
  <link rel="stylesheet" href="{{asset('/css/adminContrate/home-admin.css')}}">
<link href="https://fonts.googleapis.com/css?family=Francois+One|Indie+Flower|Quicksand|Shadows+Into+Light&amp;display=swap" rel="stylesheet">
  <style type="text/css">
    body{
      background-color: #fafafa;
    }
    .b{
      box-shadow:0 2px 6px rgba(0, 0, 0, 0.4);
      -webkit-box-shadow:0 2px 6px rgba(0, 0, 0, 0.4);
      -moz-box-shadow:0 2px 6px rgba(0, 0, 0, 0.4);
      border-radius: 5px;
    }

    .w{
     color: rgba(67, 66, 93, 0.5);
   }

   .g{
     font-size: 50px;
     background: -webkit-linear-gradient(#eee, green);
     -webkit-background-clip: text;
     -webkit-text-fill-color: transparent;
   }


   .carousel-inner{
    border-radius: 10px;
  }

  .carousel-item{
    height: 200px;
  }


   .cacta {
    font-size: 20px;
    font-family: 'Shadows Into Light', cursive;
}
</style>

</head>


<body>

  <div class="page-wrapper chiller-theme toggled">

    <a id="show-sidebar" class="btn btn-sm btn-dark py-3" href="#">
     <i class="fas fa-bars"></i>
   </a>



   @include('adminContratante.includes.menu-contratante')

   <!-- sidebar-wrapper  -->
   <main class="page-content">

     <div class="container-fluid">
      <div class="row  p-0 m-0">
        <div class="col w p-0 m-0">
          <span class="text-right" style="font-size: 28px;
          color:#754026; font-weight: 600">{{\Auth::user()->nome_empresa}}</span><br>
 <i> <span class="text-center" id = "staticText" >"Ser empreendedor é <span style="color: green" id="typeline" ></span>"</span></i> <br>
  -<span class="cacta"> Cacta</span>
        </div>
        <a href="{{route('cactalogout')}}">
        <div class="col text-right  p-0 m-0">
       <!--  <p class="text-right" style=" background-color: red;   font-size: 28px;
        color: #43425D;">Overview</p> -->
        <i class="fas fa-sign-out-alt" style="font-size: 22px;
        color: #754026;"></i>
        <p class="w" style="padding-right: 5px">Sair</p>

      </div>
      </a>
    </div>
  </div>


  <div class="container-fluid  py-0 my-0">

    <div class="row p-0 m-0">
      <div class="col mb-3">
        <p class="text-left" style="    font-size: 28px;
        color: #43425D;">Overview</p>
        <hr style=" border-top: 2px solid #754026">
      </div>
    </div>


    <div class="row">

      <div class="col-sm-4">
        <div class="row b m-1">
          <div class="col p-3">
            <p class="w">Total de vagas cadastradas</p>
            <p style="font-weight: bold; font-size: 25px;color: #754026">1<span style="font-size: 18px">/3</span></p>
          </div>
          <div class="col-md-4 p-0 m-0  d-none d-md-block">
           <div class="h-100 w-100" style="">
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
        <p class="w">Total de interessados em suas vagas</p>
        <p style="font-weight: bold; font-size: 25px;color: #754026">2<span style="font-size: 18px">/3</span></p>
      </div>
      <div class="col-md-4 p-0 m-0  d-none d-md-block">
       <div class="h-100 w-100" style="">
        <div class="mx-auto w-50">
         <i class="fas fa-users g pt-5"></i>
       </div>
     </div>
   </div>
 </div>
</div>




<div class="col-sm-4">
  <div class="row b m-1">
    <div class="col p-3">
      <p class="w">Total de vagas em destaque</p>
      <p style="font-weight: bold; font-size: 25px;color: #754026">3<span style="font-size: 18px">/3</span></p>
    </div>
    <div class="col-md-4 p-0 m-0  d-none d-md-block">
     <div class="h-100 w-100" style="">
      <div class="mx-auto w-50">
       <i  class=" g fas fa-star pt-5"></i>
     </div>
   </div>
 </div>
</div>
</div>

</div>



<div class="row mt-3">
  <div class="col mb-3">
    <p class="text-left" style=" font-size: 28px;
    color: #43425D;">Novidades</p>

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
      </ol><!-- /.carousel-indicators -->
      
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
      </div><!-- /.carousel-inner -->
      
      <a href="#main-carousel" class="carousel-control-prev" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="sr-only" aria-hidden="true">Prev</span>
      </a>
      <a href="#main-carousel" class="carousel-control-next" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="sr-only" aria-hidden="true">Next</span>
      </a>
    </div><!-- /.carousel -->
  </div>

</div>
























<div class="row">

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
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>John</td>
            <td>Doe</td>
            <td>john@example.com 
              <i style="color: #754026" class="fas fa-arrow-right float-right"></i>
            </td>
          </tr>

          <tr>
            <td>Mary</td>
            <td>Moe</td>
            <td>mary@example.com
             <i style="color: #754026" class="fas fa-arrow-right float-right"></i>
           </td>
         </tr>

         <tr>
          <td>July</td>
          <td>Dooley</td>
          <td>july@example.com
           <i style="color: #754026" class="fas fa-arrow-right float-right"></i>
         </td>
       </tr>

     </tbody>
   </table>
 </div>

 <div class="col-md-4  p-3 m-0">
  <div class="h-100 w-100" style="">
    <div class="mx-auto">
     <p class="w p-5">Visualize todas suas vagas clicando <a href="#">aqui.</a></p>
     <!-- <i  class=" g fas fa-star pt-5"></i> -->
   </div>
 </div>
</div>
</div>
</div>
</div>
















</div>












</main>
</div>







<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('/js/admin/admin-menu.js')}}"></script>

<script type="text/javascript">

                  function write (obj, sentence, i, cb) {
                    if (i != sentence.length) {
                      setTimeout(function () {
                        i++
                        console.log('in timeout', i)
                        obj.innerHTML = sentence.substr(0, i+1) +' <em aria-hidden="true"></em>';
                        write(obj, sentence, i, cb)
                      }, 170)
                    } else {
                      console.log(i)
                      cb()
                    }
                  }
                   function erase (obj, cb,i) {
                   var sentence = obj.innerText
                      if (sentence.length != 0) {
                       setTimeout(function () {
                       sentence = sentence.substr(0,sentence.length-1)
                       console.log('in timeout', i)
                       obj.innerText = sentence
                       erase(obj, cb)
                        }, 18/(i*(i/10000000)))
                        } else {
                        obj.innerText = " "
                        cb()
                     }
                    }
                    var typeline = document.querySelector("#typeline")

                     function writeerase(obj, sentence, time, cb) {
                      write(obj, sentence, 0, function () {
                       setTimeout(function () {
                       erase(obj, cb) }, time) })
                       }

                 var sentences = [
"ser persistente. ",
"ser focado. ",
"ser forte. ",
"ser você. "
]
                    
                  var counter = 0
                  function loop () {
                    var sentence = sentences[counter % sentences.length]
                    writeerase(typeline, sentence, 1300, loop)
                    counter++
                  }

                  loop()
</script>
</body>

</html>