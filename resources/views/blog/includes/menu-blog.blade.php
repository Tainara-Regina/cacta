@inject('menu', 'App\Http\Controllers\BlogController')

<nav id="topNav" class="navbar navbar-expand-lg navbar-light bg-light m-0 p-0 menu sticky-top">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target=".navbar-collapse">
    ☰
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown"  style="width:27%;">
   <ul class="nav navbar-nav logo-redes">
    <li class="nav-item">
      <a class="nav-link" href="#"> <a class="nav-link" href="#">
        <i class="fa fa-instagram"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"> <a class="nav-link" href="#"><i class="fa fa-facebook"></i>
      </a> 
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#"> <a class="nav-link" href="#"><i class="fa fa-pinterest"></i>
      </a>
    </li>
  </ul>


</div>
<a class="navbar-brand mx-auto pl-5 text-center" href="#"> <img class="animated rubberBand cacto" style="height: 50px;" src="https://image.flaticon.com/icons/png/512/43/43369.png"> 
 <p class="text-center mb-0 pb-0 logo">Blog do Cacta</p>
</a>
<div class="navbar-collapse collapse">
 <ul class="navbar-nav">


  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <b style="color: black">Categorias</b>
    </a>

    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      @foreach($menu->menu() as $menu)
      <a class="dropdown-item" href="{{route('categoria',$menu->slug)}}">{{$menu->name}}</a>
      <div class="dropdown-divider"></div>
      @endforeach
    </div>
  </li>


  <!-- <li class="nav-item active">
    <a class="nav-link" href="{{route('site.inicio')}}">Cacta Vagas</a>
  </li> -->

  <li class="nav-item active">
   <form class="form-inline" method="get" action="{{route('busca')}}">
    <input class="form-control mr-sm-2" name="s" type="text" placeholder="Pesquisar">
    <button class="btn btn-success" type="submit"><i style="font-size: 22px;" class="fa fa-search"></i></button>
  </form>
</li>

</ul>

</div>
</nav>
