@extends('site.base')

@section('titulo')
<title>Cacta Vagas - Cadastre-se para começar a contratar</title>
@stop

<!-- Bootstrap core CSS -->
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
<meta name="theme-color" content="#754026">
<link rel="stylesheet" href="{{asset('/css/inicio.css')}}">
<link rel="stylesheet" href="{{asset('/css/menu.css')}}">
<link rel="stylesheet" href="{{asset('/css/rodape.css')}}">

<link href="https://fonts.googleapis.com/css?family=Francois+One|Indie+Flower|Quicksand|Shadows+Into+Light&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Kulim+Park&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="{{asset('/js/mascara.js')}}"></script>
<link rel="stylesheet" href="{{asset('/css/formularioContratanteParte2.css')}}">
@stop



@section('conteudo')
<main role="main">
  @include('site.includes.menu')
  <section>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-8 col-lg-10 col-xl-10 mx-auto my-5">
          <div class="row">
            <div class="col text-center">
              <h2>Seja bem vindo(a) {{$nome}}!</h2>
              <h4>Sua confirmação foi feita com sucesso!</h4>
              <h5 class="text-h3 mt-3">Esta é a última etapa para você começar a contratar.</h5>
              <h5>Fale sobre a sua empresa preenchendo os dados abaixo.</h5>

              <h5 class="text-h3 mb-5">Estas informações serão necessárias para a divulgação de suas vagas.</h5>
            </div>
          </div>


          <form action="{{route('site.formularioContratanteParte2')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <section>

              <input type="hidden" name="id" value="{{$usuario->id}}">
              <input type="hidden" value="{{old('plano')}}" name="plano" id="plano" value="">
              <input type="hidden" id="logradouro" name="logradouro" value="">
              <input type="hidden" id="bairro" name="bairro" value="">
              <input type="hidden" id="localidade" name="localidade" value="">
              <input type="hidden" id="uf" name="uf" value="">




              @error('logo')
              <span style="color: red">{{ $message }}</span>
              @enderror
              <div class="form-group">
                <label for="email"><b>*Logo da empresa</b></label>
                <input value="{{old('logo')}}" accept="image/png, image/jpeg , image/jpg" placeholder="Insira o logo da empresa" type="file" name="logo" class="form-control-file border" required>
              </div>


              @error('segmento')
              <span style="color: red">{{ $message }}</span>
              @enderror
              <div class="form-group my-5">
                <div class="main">
                  <label for="pwd"><b>*Selecione o segmento da sua empresa</b></label>


                  <select value="{{old('segmento')}}" name="segmento" required>
                    <option  value="" selected disabled>Selecione o segmento</option>
                    @foreach ($segmentos as $segmento)
                    <option  value="{{ $segmento->id }}">{{ $segmento->segmento }}</option>
                    @endforeach
                  </select>
                </div>
              </div>


              @error('cep')
              <span style="color: red">{{ $message }}</span> <br>
              @enderror

              @error('endereco')
              <span style="color: red">{{ $message }}</span>
              @enderror

              <div class="form-group">
                <label for="email"><b>*Endereço</b></label>
                <input type="text" value="{{old('cep')}}" name="cep" placeholder="Digite o CEP" type="text" class="form-control cep" required>

                <input name="endereco" value="{{old('endereco')}}" class="mt-2 form-control endereco"  rows="5" id="comment" readonly="readonly" required>

                @error('numero')
                <div class="mt-3">
                  <span style="color: red">{{ $message }}</span>
                </div>
                @enderror

                <input style="width: 100px!important" type="text" value="{{old('numero')}}" name="numero" placeholder="Número" type="text" class="form-control mt-3" maxlength="5" required>
              </div>

              <div class="form-group">

              </div>


              <div class="form-group">
                <label for="email"><b>Complemento</b></label>
                <textarea class="mt-2 form-control" name="complemento" placeholder='Digite o complemento do endereço.' rows="5" id="comment">{{old('complemento')}}</textarea>
              </div>


              @error('sobre')
              <span style="color: red">{{ $message }}</span>
              @enderror
              <div class="form-group">
                <label for="pwd"><b>*Fale sobre sua empresa</b></label>
                <p>Apresente sua empresa para os candidatos. Tente falar sobre a trajetória, missão, visão e valores.</p>
                <textarea name="sobre" placeholder="Faça um resumo sobre sua empresa.Tente falar sobre a tragetoria, missão, visão e valores." class="form-control" rows="5" id="comment" required>{{old('sobre')}}</textarea>
              </div>


              <label for="comment"><b>Redes sociais da empresa:</b></label>

              <div class="form-group">
                <input name="facebook" value="{{old('facebook')}}" type="text" class="form-control" placeholder="Facebook"></input>
              </div>

              <div class="form-group">
                <input name="instagram" value="{{old('instagram')}}" placeholder="Instagram" type="text" class="form-control"></input>
              </div>

              <div class="form-group">
                <input name="twitter" value="{{old('twitter')}}" placeholder="Twitter" type="text" class="form-control"></input>
              </div>

              <div class="form-group">
                <input name="site" placeholder="Site" value="{{old('site')}}" type="text" class="form-control"></input>
              </div>


              
              <div class="row">
                <div class="col">
                  <h2 class="text-center mt-5 mb-3">*Escolha o plano</h2>
                  <p class="text-center"><b>Obs: </b>Se desejar, você pode cancelar o plano após o período gratuito.</p>
                </div>
              </div>

              <div class="row">
                <div class="col text-center mb-3">
                 @error('plano')
                 <span style="color: red">{{ $message }}</span>
                 @enderror
               </div>
             </div>


             <div class="row pricing">

              @foreach($planos as $plano)

              <div class="col-lg-5 col-8 mx-auto" >
                <div class="card mb-5 mb-lg-0 plano" data-plano="{{$plano->id}}">
                  <div class="card-body">
                    <h4 class="card-title text-muted text-uppercase text-center">{{$plano->plano}}</h5>
                      <h6 class="text-center text-muted">Após periodo gratuito</h6>
                      <h6 class="card-price text-center">${{$plano->preco}} <span class="period text-muted"><small>/mês</small> </span>
                      </h6>
                      <hr>
                      <ul class="fa-ul">

                        <li><span class="fa-li"><i class="fa fa-check"></i></span> {{$plano->quantidade_vagas}} vaga(s) para divulgar por mês <small>(inclui renovar vagas existentes)</small></li>

                        @if($plano->vagas_em_destaque == 0)
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Permite destacar suas vagas</li>

                        @else
                        <li><span class="fa-li"><i class="fa fa-check"></i></span> Permite destacar {{$plano->vagas_em_destaque}} de suas vagas </li>
                        @endif


                        @if($plano->banco_de_candidatos == 0)
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Banco de candidatos</li>

                        @else
                        <li><span class="fa-li"><i class="fa fa-check"></i></span> Banco de candidatos</li>
                        @endif



                        @if($plano->materiais_exclusivos == 0)
                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Materiais exclusivos sobre empreendedorismo</li>

                        @else
                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Materiais exclusivos sobre empreendedorismo</li>
                        @endif


                      </ul>
                      <span class="btn btn-block btn-primary text-uppercase"> Selecionar</span>
                    </div>
                  </div>
                </div>
                @endforeach

              </div>










              <div class="row">
                <div class="col">
                  <h2 class="text-center mt-5 mb-3">Dados de pagamento</h2>
                  <p class="text-center">Insira os dados do cartão.</p>
                </div>
              </div>





              <div class="row">
                <div class="col-md-9 mx-auto">

                  @error('nome_cartao')
                  <span style="color: red">{{ $message }}</span>
                  @enderror
                  <div class="form-group">
                    <input name="nome_cartao" placeholder="Nome" value="{{ old('nome_cartao')}}" type="text" class="form-control name" required>
                  </div>

                  @error('numero_cartao')
                  <span style="color: red">{{ $message }}</span>
                  @enderror
                  <div class="form-group">
                    <input name="numero_cartao" placeholder="Número do cartão" value="{{old('numero_cartao')}}" maxlength="20" type="text" class="form-control cartao" required>
                  </div>


                  @error('expira_cartao')
                  <span style="color: red">{{ $message }}</span>
                  @enderror
                  <div class="form-group">
                    <input name="expira_cartao" placeholder="Data de expiração do cartão" min="5" value="{{old('expira_cartao')}}" type="text" class="form-control date_cartao" required>
                  </div>


                  @error('codigo_seguranca_cartao')
                  <span style="color: red">{{ $message }}</span>
                  @enderror
                  <div class="form-group">
                    <input name="codigo_seguranca_cartao" placeholder="Código de segurança do cartão" value="{{old('codigo_seguranca_cartao')}}" type="text" class="form-control cvv" required>
                  </div>
                </div>
              </div>




              <div class="row"> 
                <div class="col-md-4 mx-auto text-center"> 

                  <div class="g-recaptcha" data-sitekey="6Ld2DwEVAAAAADI7nTlqa3owIG_ED_qxplTSQ9AP">

                  </div>
                </div>
              </div>






              <div class="row"> 
                <div class="col text-center"> 
                  <button type="submit" class="btn btn-success my-5 mt-3 text-center py-3 px-5 text-uppercase"> <b>Concluir e começar a contratar!</b></button>
                </div>
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</main>
@stop

@section('rodape')
@include('site.includes.rodape')
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{asset('js/slick.js')}}"></script>
<script src="{{asset('js/home.js')}}"></script>
<script src="{{asset('/js/formularioContratante-2.js')}}"></script>
@stop


