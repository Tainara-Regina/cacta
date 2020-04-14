<nav id="sidebar" class="sidebar-wrapper">
	<div class="sidebar-content">
		<div class="sidebar-brand text-center py-4">
			<a href="#">{{\Auth::user()->nome}}</a>
			<div id="close-sidebar">
				<i class="fas fa-arrow-circle-left"></i> </div>
		</div>


		<!-- sidebar-search  -->
		<div class="sidebar-menu">
			<ul>

				<li class="header-menu">
					<span>MEUS DADOS</span>
				</li>
				<li>
					<a href="{{route('site.meus-dados')}}">
						<i class="fa fa-book"></i>
						<span>Meus dados pessoais</span>
					</a>
				</li>

				<li>
					<a href="{{route('site.meus-dados-pessoais')}}">
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
					<a href="{{route('site.divulgar-vaga')}}">
						<i class="fa fa-book"></i>
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
						
					</a>
				</li>



				<li class="header-menu">
					<span>APERFEIÇOAMENTOS E CURSOS</span>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-book"></i>
						<span>Aperfeiçoamentos</span>
						
					</a>
				</li>


				<li>
					<a href="#">
						<i class="fa fa-book"></i>
						<span>cursos</span>
						
					</a>
				</li>



				<li>
					<a href="#">
						<i class="fa fa-book"></i>
						<span>workshop</span>
						
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