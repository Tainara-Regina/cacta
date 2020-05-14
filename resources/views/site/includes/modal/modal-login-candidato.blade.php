 <!-- The Modal -->
 <div class="modal" id="modalCandidato">
 	<div class="container mt-5">
 		<div class="row justify-content-sm-center">
 			<div class="col-md-10 col-lg-8">
 				<div class="card border-info">
 					<p type="button" style="font-size: 46px;" class="close pr-3 text-right" ><span data-dismiss="modal">&times;</span></p>

 					<h3 class="text-center">Área do candidato</h3>
                   <h6 class="text-center">Insira seue dados e faça login como contratante.</h6>
                   <div class="card-body">
                     <div class="row">

                        <div class="col">
                               @if(session()->has('message_candidato'))
                       <script type="text/javascript">
                          $(document).ready(function(){
                             $("#modalCandidato").modal();
                         });
                     </script>
                     <p style="color: red" class="text-center">{{ session()->get('message_candidato') }}</p>
                     @endif

                            <form method="POST" action="{{ route('cactalogin-candidato') }}">
                                @csrf
                                <input type="hidden" name="vaga" id="vaga_candidato" value="null">
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

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

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Entrar') }}
                        </button>
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">

                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('redefinir-senha-candidato') }}">
                            {{ __('Esqueceu sua senha? Clique aqui.') }}
                        </a>
                        @endif


                        <a class="btn btn-link" href="{{route('formularioCandidato')}}">
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