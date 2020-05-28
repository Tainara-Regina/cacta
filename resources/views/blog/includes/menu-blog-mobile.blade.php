@inject('menu', 'App\Http\Controllers\BlogController')
<nav id="NavMobile" class="navbar navbar-expand-lg navbar-light bg-light menu p-0">

	<a class="pl-2 text-center" href="{{route('blog-home')}}"> <img class="animated rubberBand cacto" style="height: 35px;" src="https://image.flaticon.com/icons/png/512/43/43369.png"> 
		<p class="text-center mb-0 pb-0 logo">Cacta Vagas Blog</p>
	</a> 


	<form class="form-inline" method="get" action="{{route('busca')}}">
		<input style="width: 120px;" class="form-control  mr-sm-2" name="s" type="text" placeholder="Pesquisar">
		<button class="btn btn-success mx-2" type="submit"><i style="font-size: 17px;" class="fa fa-search"></i></button>
	</form>


	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
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

		</ul>
	</div>
</nav>
