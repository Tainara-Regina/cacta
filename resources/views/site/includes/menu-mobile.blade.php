
<nav id="NavMobile" class="navbar navbar-expand-lg navbar-light bg-light menu p-0">
   <a class="navbar-brand mx-auto text-center" href="{{route('site.inicio')}}"> <img class="animated rubberBand cacto" style="height: 35px;" src="https://image.flaticon.com/icons/png/512/43/43369.png"> 
     <p class="text-center mb-0 pb-0 logo">Cacta Vagas</p>
 </a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <b style="color: green">Entrar</b>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalCandidato">Área do candidato</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalContratante">Área do contratante</a>
    </div>
</li>
@if(!Request::session()->get('menu_candidato'))
<li class="nav-item active">
  <a class="nav-link" href="{{route('formularioCandidato')}}">Cadastre-se</a>
</li>
@endif
@if(!Request::session()->get('menu_contratante'))
<li class="nav-item active">
  <a class="nav-link"  href="{{route('formularioContratante')}}">Contrate</a>
</li>
@endif
<li class="nav-item active">
  <a class="nav-link" href="{{route('blog-home')}}">Blog do Cacta</a>
</li>
</ul>
</div>
</nav>
