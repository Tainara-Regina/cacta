<nav id="sidebar" class="sidebar-wrapper">
	<div class="sidebar-content">
		<div class="sidebar-brand text-center py-4">
			<!-- <a href="#">{{\Auth::user()->nome_empresa}}</a> -->

			<a class="navbar-brand mx-auto text-center" href="#"> <img class="animated rubberBand cacto" style="height: 45px;" src="https://image.flaticon.com/icons/png/512/43/43369.png"> 
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
						<a href="{{route('site.admin-contratante')}}">
							<i class="fa fa-book"></i>
							<span>Dashboard</span>
						</a>
					</li>







					<li class="header-menu">
						<span>MINHA EMPRESA</span>
					</li>
					<li>
						<a href="{{route('site.meus-dados')}}">
							<i class="fa fa-book"></i>
							<span>Meus dados</span>
						</a>
					</li>


					<li>
						<a href="{{route('site.meus-dados-pessoais')}}">
							<i class="fa fa-book"></i>
							<span>Meus dados pessoais</span>
						</a>
					</li>



					<li>
						<a href="{{route('site.preferencias')}}">
							<i class="fa fa-book"></i>
							<span>Preferências</span>
						</a>
					</li>



					<li class="header-menu">
						<span>CONTRATE</span>
					</li>
					<li>
						<a href="{{route('site.divulgar-vaga')}}">
							<i class="fa fa-book"></i>
							<span>Divulgar vaga</span>
						</a>
					</li>
					<li>
						<a href="{{route('site.candidatos-vaga')}}">
							<i class="fa fa-tachometer-alt"></i>
							<span>Minhas vagas</span>
						</a>
					</li>

					@can('banco_de_candidatos')
					<li class="sidebar-dropdown">
						<a href="#">
							<i class="fa fa-shopping-cart"></i>
							<span>Banco de candidatos</span>
						</a>
						<div class="sidebar-submenu">
							<ul>
								<li>
									<a href="{{route('site.banco-candidato')}}">Melhores cadastros
									</a>
								</li>
							</ul>
						</div>
					</li>
					@endcan



					@can('materiais_exclusivos')
					<li class="header-menu">
						<span>MATERIAIS EXCLUSIVOS</span>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-book"></i>
							<span>Materiais</span>
							<span  style="padding: 0px;">
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
							<span  style="padding: 0px;">
								<i class="fas fa-lock"></i>
							</span>
						</a>
					</li>

					<li>
						<a href="#">
							<i class="fa fa-book"></i>
							<span>cursos</span>
							<span  style="padding: 0px;">
								<i class="fas fa-lock"></i>
							</span>
						</a>
					</li>

					<li>
						<a href="#">
							<i class="fa fa-book"></i>
							<span>workshop</span>
							<span  style="padding: 0px;">
								<i class="fas fa-lock"></i>
							</span>
						</a>
					</li>
					@endcan
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