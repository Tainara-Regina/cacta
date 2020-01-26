 <!-- The Modal -->
 <div class="modal" id="modalContratante">
 	<div class="container mt-5">
 		<div class="row justify-content-sm-center">
 			<div class="col-md-10 col-lg-8">
 				<div class="card border-info">
 					<div class="card-header"><button type="button" class="close" data-dismiss="modal">&times;</button></div>

 					<h3 class="text-center mt-3">Área do contratante</h3>

 					<div class="card-body">
 						<div class="row">
 							<div class="col-md-4 text-center">
 								<img src="https://placeimg.com/128/128/tech/sepia">
 								<h4 class="text-center">Cacta</h4>
 							</div>
 							<div class="col-md-8">
 								<form class="form-signin" method="post" action="{{route('site.admin-contratante')}}">
 									@csrf
 									<input type="text" class="form-control mb-2" placeholder="Email" required autofocus>
 									<input type="password" class="form-control mb-2" placeholder="Password" required>
 									<button class="btn btn-lg btn-primary btn-block mb-1" type="submit">ENTRAR</button>
 									<label class="checkbox float-left">
 										<input type="checkbox" value="remember-me">
 										Lembrar
 									</label>
 									<a href="#" class="float-right">Não é cadastrado? Cadastre-se aqui.</a>
 								</form>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>