 
//Faz o efeito do buscador de descer até as vagas
$(document).ready(function(){
  $("#buscar").focus(function(){
    $("#topNav").removeClass("sticky-top");
    $("#topNav").addClass("fixed-top");
    $('html, body').animate({scrollTop:30}, 1000);
    $("#filtro").addClass("d-block");
    $(".conteudo-pesquisa").css("height","100%");
  });

  $("#filtrar").change(function() {
    if(this.checked) {
      $("#filtro-mobile").css("display","block");
    }
    if(!this.checked) {
      $("#filtro-mobile").css("display","none");
    }
  });

  $("#buscar").keyup(function(){ 
    $('html, body').stop().animate({scrollTop:50}, 1000);
  });
});



//faz busca de vagas no on focus e on change
$(document).ready(function(){
  $('#buscar').on('keyup keypress blur change focus', function(e) {


   $.post("/vagas-ajax",
   {
    buscar:  $("#buscar").val(),
  },
  function(data, status){
    $(".vagas").html("");
    for (var i = 0; i < data.length; i++) {

      var top = "<a href='/vaga/"+data[i].id+"'><div class='row  text-center py-3' style='border-bottom: 1px solid #bdbdbd'><div class='col d-none d-sm-block'><img width='80px' src='storage/"+data[i].logo+"'></div><div class='col'><p><b>"+data[i].titulo+"</b></p><p>"+data[i].nome_empresa+"</p></div><div class='col'><p><b>"+data[i].contratacao+"</b></p><p>"+data[i].localidade+"</p></div>";

      var d = new Date(data[i].data_de_criacao);

      if(data[i].vaga_em_destaque == 'on'){
        top += "<div class='col mt-4'><p><span class='vaga-destaque'>Destaque</span></p></div></div></a>";
      }else{
        top += "<div class='col mt-4'><p class=''>Divulgada em "+d.toLocaleDateString()+"</p></div></div></a>";
      }
      $(".vagas").append(top);   
    }
  });
 });
});

