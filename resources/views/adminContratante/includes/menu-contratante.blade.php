<nav id="sidebar" class="sidebar-wrapper">
	<div class="sidebar-content">
		<div class="sidebar-brand text-center py-4">
			<a href="#">Cacta<br>admin do contratante</a>
			<div id="close-sidebar">
				<i class="fas fa-times"></i>
			</div>
		</div>



		<!-- sidebar-search  -->
		<div class="sidebar-menu">
			<ul>

				<li class="header-menu">
					<span>MINHA EMPRESA</span>
				</li>
				<li>
					<a href="{{route('site.meus-dados')}}">
						<i class="fa fa-book"></i>
						<span>Meus dados</span>
						<span class="badge badge-pill badge-primary">novo</span>
					</a>
				</li>


				<li class="header-menu">
					<span>CONTRATE</span>
				</li>
				<li>
					<a href="{{route('site.divulgar-vaga')}}">
						<i class="fa fa-book"></i>
						<span>Divulgar vaga</span>
						<span class="badge badge-pill badge-primary">novo</span>
					</a>
				</li>
				<li>
					<a href="{{route('site.candidatos-vaga')}}">
						<i class="fa fa-tachometer-alt"></i>
						<span>Minhas vagas</span>
						<span class="badge badge-pill badge-warning">novo</span>
					</a>
				</li>

				<li class="sidebar-dropdown">
					<a href="#">
						<i class="fa fa-shopping-cart"></i>
						<span>Banco de candidatos</span>
						<span class="badge badge-pill badge-danger">3</span>
					</a>
					<div class="sidebar-submenu">
						<ul>
							<li>
								<a href="#">Encontrar por área
								</a>
							</li>

							<li>
								<a href="#">Mais bem avaliados

								</a>
							</li>
							<li>
								<a href="#">Temporários</a>
							</li>
						</ul>
					</div>
				</li>


				<li class="header-menu">
					<span>MATERIAIS EXCLUSIVOS</span>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-book"></i>
						<span>Materiais</span>
						<span class="badge badge-pill badge-primary">novo</span>
					</a>
				</li>





				<li class="header-menu">
					<span>APERFEIÇOAMENTOS E CURSOS</span>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-book"></i>
						<span>Aperfeiçoamentos</span>
						<span class="badge badge-pill badge-primary">novo</span>
					</a>
				</li>


				<li>
					<a href="#">
						<i class="fa fa-book"></i>
						<span>cursos</span>
						<span class="badge badge-pill badge-primary">novo</span>
					</a>
				</li>



				<li>
					<a href="#">
						<i class="fa fa-book"></i>
						<span>workshop</span>
						<span class="badge badge-pill badge-primary">novo</span>
					</a>
				</li>
			</ul>
		</div>
		<!-- sidebar-menu  -->
	</div>
	<!-- sidebar-content  -->
	<div class="sidebar-footer">
		<a href="#">
			<i class="fa fa-bell"></i>
			<span class="badge badge-pill badge-warning notification">3</span>
		</a>
		<a href="#">
			<i class="fa fa-envelope"></i>
			<span class="badge badge-pill badge-success notification">7</span>
		</a>
		<a href="#">
			<i class="fa fa-cog"></i>
			<span class="badge-sonar"></span>
		</a>
		<a href="{{route('cactalogout')}}">
			<i class="fa fa-power-off"></i>
		</a>
	</div>
</nav>