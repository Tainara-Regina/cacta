<nav id="sidebar" class="sidebar-wrapper">
	<div class="sidebar-content">
		<div class="sidebar-brand text-center py-4">
			<!-- <a href="#">{{\Auth::user()->nome_empresa}}</a> -->

			<a class="navbar-brand mx-auto text-center" href="#"> <img class="animated rubberBand cacto" style="height: 45px;" src="{{asset('/img/logo_cacta.png')}}"> 
				<p class="text-center mb-0 pb-0 logo">Cacta Vagas</p>
			</a>




			<div id="close-sidebar">
				<i class="fas fa-arrow-circle-left"></i> </div>
			</div>



			<!-- sidebar-search  -->
			<div class="sidebar-menu">
				<ul>




					<li class="header-menu">
						<span>DASHBOARD</span>
					</li>
					<li>
						<a href="{{route('site.admin-candidato')}}">
							<i class="fa fa-book"></i>
							<span>Dashboard</span>
						</a>
					</li>







					<li class="header-menu">
						<span>MEUS DADOS</span>
					</li>
					<li>
						<a href="{{route('meus-dados-pessoais')}}">
							<i class="fa fa-book"></i>
							<span>Meus dados pessoais</span>
						</a>
					</li>


					<li>
						<a href="{{route('preferencias')}}">
							<i class="fa fa-book"></i>
							<span>Preferências</span>
						</a>
					</li>



					<li>
						<a href="{{route('meu-perfil')}}">
							<i class="fa fa-book"></i>
							<span>Meu perfil</span>
						</a>
					</li>



					<li class="header-menu">
						<span>VAGAS</span>
					</li>
					<li>
						<a href="{{route('site.lista-vaga')}}">
							<i class="fa fa-book"></i>
							<span>Encontrar vagas</span>
						</a>
					</li>
					<li>
						<a href="{{route('minhas-vagas')}}">
							<i class="fa fa-tachometer-alt"></i>
							<span>Vagas que me candidatei</span>
						</a>
					</li>

					


					<li class="header-menu">
						<span>MATERIAIS EXCLUSIVOS</span>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-book"></i>
							<span>Materiais</span>
							<span>
								<i class="fas fa-lock"></i>
							</span>
						</a>
					</li>





					<li class="header-menu">
						<span>APERFEIÇOAMENTOS E CURSOS</span>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-book"></i>
							<span>Aperfeiçoamentos</span>
							<span>
								<i class="fas fa-lock"></i>
							</span>
						</a>
					</li>


					<li>
						<a href="#">
							<i class="fa fa-book"></i>
							<span>cursos</span>
							<span>
								<i class="fas fa-lock"></i>
							</span>
						</a>
					</li>



					<li>
						<a href="#">
							<i class="fa fa-book"></i>
							<span>workshop</span>
							<span >
								<i class="fas fa-lock"></i>
							</span>
						</a>
					</li>
				</ul>
			</div>
			<!-- sidebar-menu  -->
		</div>
		<!-- sidebar-content  -->
		<div class="link text-center">
			<a href="#">
				<span class="cacta">Cacta </span> 2019 - <span style="font-size: 22px"> ∞</span> <span style="color: red">♥</span>.
			</a>
		</div>
	</nav>