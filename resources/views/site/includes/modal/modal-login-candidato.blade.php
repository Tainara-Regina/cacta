 <!-- The Modal -->
 <div class="modal" id="modalCandidato">
 	<div class="container mt-5">
 		<div class="row justify-content-sm-center">
 			<div class="col-sm-10 col-md-6">
 				<div class="card border-info">
 					<div class="card-header"><button type="button" class="close" data-dismiss="modal">&times;</button></div>

 					<h3 class="text-center mt-3">Área do candidato</h3>

 					<div class="card-body">
 						<div class="row">
 							<div class="col-md-4 text-center">
 								<img src="https://placeimg.com/128/128/tech/sepia">
 								<h4 class="text-center">Cacta</h4>
 							</div>
 							<div class="col-md-8">
 							<form method="POST" action="{{ route('cactalogin-candidato') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email_login') is-invalid @enderror" name="email_login" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email_login')
                                        <script type="text/javascript">
                                          $(document).ready(function(){
                                             $("#modalContratante").modal();
                                         });
                                     </script>
                                     <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password_login') is-invalid @enderror" name="password_login" required autocomplete="current-password">

                                    @error('password_login')
                                    <script type="text/javascript">
                                      $(document).ready(function(){
                                         $("#modalContratante").modal();
                                     });
                                 </script>
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif


                                <a class="btn btn-link" href="{{route('formularioContratante')}}">
                                    Ainda não é cadastrado? Clique aqui.
                             </a>

                         </div>
                     </div>
                 </form>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>