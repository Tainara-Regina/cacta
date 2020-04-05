<!DOCTYPE html>
<html lang="pt">
<head> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="cacta">
  <title>Cadastre-se contratante</title>

  <!-- Bootstrap core CSS -->
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


  <script type="text/javascript">
   $(document).ready(function($){
     $('.name').mask('Z',{translation: {'Z': {pattern: /[a-zA-Z ]/, recursive: true}}});
     $('.date').mask('00/00/0000');
     $('.time').mask('00:00:00');
     $('.date_time').mask('00/00/0000 00:00:00');
     $('.cep').mask('00000-000');
     $('.cvv').mask('000');
     $('.cartao').mask('#');
     $('.phone').mask('0000-0000');
     $('.phone_with_ddd').mask('(00) 0000-0000');
     $('.phone_us').mask('(000) 000-0000');
     $('.mixed').mask('AAA 000-S0S');
     $('.cpf').mask('000.000.000-00', {reverse: true});
     $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
     $('.money').mask('000.000.000.000.000,00', {reverse: true});
     $('.money2').mask("#.##0,00", {reverse: true});
     $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
      translation: {
        'Z': {
          pattern: /[0-9]/, optional: true
        }
      }
    });
     $('.ip_address').mask('099.099.099.099');
     $('.percent').mask('##0,00%', {reverse: true});
     $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
     $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
     $('.fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/,
          fallback: '/'
        },
        placeholder: "__/__/____"
      }
    });
     $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
   });
 </script>

</head>


<style type="text/css">
  section.pricing {
    background: #007bff;
    background: linear-gradient(to right, #0062E6, #33AEFF);
  }

  .pricing .card {
    border: none;
    border-radius: 1rem;
    transition: all 0.2s;
    box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
  }

  .pricing hr {
    margin: 1.5rem 0;
  }

  .pricing .card-title {
    margin: 0.5rem 0;
    font-size: 0.9rem;
    letter-spacing: .1rem;
    font-weight: bold;
  }

  .pricing .card-price {
    font-size: 3rem;
    margin: 0;
  }

  .pricing .card-price .period {
    font-size: 0.8rem;
  }

  .pricing ul li {
    margin-bottom: 1rem;
  }

  .pricing .text-muted {
    opacity: 0.7;
  }

  .pricing .btn {
    font-size: 80%;
    border-radius: 5rem;
    letter-spacing: .1rem;
    font-weight: bold;
    padding: 1rem;
    opacity: 0.7;
    transition: all 0.2s;
  }

  /* Hover Effects on Card */

  @media (min-width: 992px) {
    .pricing .card:hover {
      margin-top: -.25rem;
      margin-bottom: .25rem;
      box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
    }
    .pricing .card:hover .btn {
      opacity: 1;
    }
  }
</style>


<body>
  @include('site.includes.menu-mobile')
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

              <section style="padding: 0 20%">

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
                  <label for="email"><b>Logo da empresa</b></label>
                  <input value="{{old('logo')}}" placeholder="Insira o logo da empresa" type="file" name="logo" class="form-control-file border">
                </div>


                @error('segmento')
                <span style="color: red">{{ $message }}</span>
                @enderror
                <div class="form-group my-5">
                  <div class="main">
                    <label for="pwd"><b>Selecione o segmento da sua empresa</b></label>


                    <select value="{{old('segmento')}}" name="segmento">
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
                  <label for="email"><b>Endereço</b></label>
                  <input type="text" value="{{old('cep')}}" name="cep" placeholder="Digite o CEP" type="text" class="form-control cep">

                  <input name="endereco" value="{{old('endereco')}}" class="mt-2 form-control endereco"  rows="5" id="comment">

                  @error('numero')
                  <div class="mt-3">
                    <span style="color: red">{{ $message }}</span>
                  </div>
                  @enderror

                  <input style="width: 100px!important" type="text" value="{{old('numero')}}" name="numero" placeholder="Número" type="text" class="form-control mt-3" maxlength="5">
                </div>

                <div class="form-group">

                </div>


                <div class="form-group">
                  <label for="email"><b>Complemento</b></label>
                  <textarea class="mt-2 form-control" name="complemento" placeholder='Digite o complemento do endereço.' rows="5" id="comment"></textarea>
                </div>




                @error('sobre')
                <span style="color: red">{{ $message }}</span>
                @enderror
                <div class="form-group">
                  <label for="pwd"><b>Fale sobre sua empresa</b></label>
                  <textarea name="sobre" value="{{old('sobre')}}" placeholder="Faça um resumo sobre sua empresa.Tente falar sobre a tragetoria, missão, visão e valores." class="form-control" rows="5" id="comment"></textarea>
                </div>



                <label for="comment"><b>Redes sociais:</b></label>

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
                    <h2 class="text-center mb-3  mt-5">Dados do cartão</h2>
                    <p><b>Obs:</b> No plano gratuito nenhuma cobrança será realizada, não se preocupe.</p>

                  </div>
                </div>



                @error('nome_cartao')
                <span style="color: red">{{ $message }}</span>
                @enderror
                <div class="form-group">
                  <input name="nome_cartao" placeholder="Nome" value="{{old('nome_cartao')}}" type="text" class="form-control name"></input>
                </div>

                @error('numero_cartao')
                <span style="color: red">{{ $message }}</span>
                @enderror
                <div class="form-group">
                  <input name="numero_cartao" placeholder="Número do cartão" value="{{old('numero_cartao')}}" maxlength="20" type="text" class="form-control cartao"></input>
                </div>


                @error('expira_cartao')
                <span style="color: red">{{ $message }}</span>
                @enderror
                <div class="form-group">
                  <input name="expira_cartao" placeholder="Data de expiração do cartão" value="{{old('expira_cartao')}}" type="text" class="form-control selectonfocus"></input>
                </div>


                @error('codigo_seguranca_cartao')
                <span style="color: red">{{ $message }}</span>
                @enderror
                <div class="form-group">
                  <input name="codigo_seguranca_cartao" placeholder="Código de segurança do cartão" value="{{old('codigo_seguranca_cartao')}}" type="text" class="form-control cvv"></input>
                </div>

              </section>




              <div class="row">
                <div class="col">
                  <h2 class="text-center mt-5 mb-3">Escolha o plano que deseja</h2>
                  <p class="text-center"><b>Obs:</b> No plano gratuito nenhuma cobrança será realizada, não se preocupe.</p>
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

              
              <div class="col-lg-4 col-8 mx-auto" >
                <div class="card mb-5 mb-lg-0 plano" data-plano="{{$plano->id}}">
                  <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">{{$plano->plano}}</h5>
                    <h6 class="card-price text-center">${{$plano->preco}}<!-- <span class="period">/mês</span> --></h6>
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
                      <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Materiais exclusivos sobre emprendedorismo</li>

                      @else
                      <li><span class="fa-li"><i class="fa fa-check"></i></span>Materiais exclusivos sobre emprendedorismo</li>
                      @endif


                    </ul>
                    <span class="btn btn-block btn-primary text-uppercase"> Selecionar</span>
                  </div>
                </div>
              </div>
              @endforeach






              <!-- <div class="col-lg-4 col-8 mx-auto" >
                <div class="card plano" data-plano="3">
                  <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">Pro</h5>
                    <h6 class="card-price text-center">$49<span class="period">/month</span></h6>
                    <hr>
                    <ul class="fa-ul">
                      <li><span class="fa-li"><i class="fa fa-check"></i></span><strong>Unlimited Users</strong></li>
                      <li><span class="fa-li"><i class="fa fa-check"></i></span>150GB Storage</li>
                      <li><span class="fa-li"><i class="fa fa-check"></i></span>Unlimited Public Projects</li>
                      <li><span class="fa-li"><i class="fa fa-check"></i></span>Unlimited Public Projects</li>

                    </ul>
                    <span class="btn btn-block btn-primary text-uppercase"> Selecionar</span>
                  </div>
                </div>
              </div> -->




            </div>





            <div class="row"> 
              <div class="col text-center"> 
                <button type="submit" class="btn btn-success my-5 text-center py-3 px-5 text-uppercase"> <b>Concluir e começar a contratar!</b></button>
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




@include('site.includes.rodape')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{asset('js/slick.js')}}"></script>
<script src="{{asset('js/home.js')}}"></script>

<script type="text/javascript">

 if ($('#plano').val() != "") {
  $('[data-plano='+$('#plano').val()+']').css('border','4px solid green');
}

$(".plano").click(function(){
// passar o valor como parametro para saber o plano que foi escolhido

$('.plano').css('border','none');
$(this).css('border','4px solid green');
$('#plano').val($(this).attr("data-plano"));

});
</script>


<script type="text/javascript">
  $(".cep").keyup(function(){
    var cep = $('.cep').val();

    $('.endereco').val(null);
    $.get("https://viacep.com.br/ws/"+cep+"/json/", function(data, status){

      if(data['erro'] == true){
       $('.endereco').val(null);
     }else{

       console.log(data);
       $('#logradouro').val(data['logradouro']);
       $('#bairro').val(data['bairro']);
       $('#localidade').val(data['localidade']);
       $('#uf').val(data['uf']);

       $('.endereco').val(data['logradouro']+", "+data['bairro']+" "+data['localidade']+" - "+data['uf']);
     }
   });
  });
</script>

</body>
</html>


}


