 
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




//aciona quando o filtro checkbox é selecionado
$('input[type="checkbox"]').change(function(e) {
 buscaVaga();
});


//faz busca de vagas no on focus e on change
$(document).ready(function(){
  $('#buscar').on('keyup keypress blur change focus', function(e) {
    buscaVaga(); 
  });
});



$(document).ready(function(){
  $('#local').on('keyup keypress blur change focus', function(e) {
    buscaVaga(); 
  });
});







function buscaVaga(){
  var area = $('input[name^="area"]:checked').map(function(_, el) {
    return $(el).val();
  }).get();

  var regime = $('input[name^="regime"]:checked').map(function(_, el) {
    return $(el).val();
  }).get();

  var local = $('#local').val();

  $.post("/vagas-inicio",
  {
    buscar:  $("#buscar").val(),
    area: area,
    regime: regime,
    local: local
  },
  function(data, status){
    $(".vagas").html("");

    $("#encontramos").html("Encontramos: <b>"+data[1]+"</b> vagas");
    
    for (var i = 0; i <= data.length; i++) {

      var top = "<a href='/vaga/"+data[0][i].id+"/"+data[0][i].slug+"'><div class='row  text-center py-3' style='border-bottom: 1px solid #bdbdbd'><div class='col d-none d-sm-block'><img width='80px' src='storage/"+data[0][i].logo+"'></div><div class='col'><p><b>"+data[0][i].titulo+"</b></p><p>"+data[0][i].nome_empresa+"</p></div><div class='col'><p><b>"+data[0][i].contratacao+"</b></p><p>"+data[0][i].localidade+"</p></div>";

      var d = new Date(data[0][i].data_de_criacao);

      if(data[0][i].vaga_em_destaque == 'on'){
        top += "<div class='col mt-4'><p><span class='vaga-destaque'>Destaque</span></p></div></div></a>";
      }else{
        top += "<div class='col mt-4'><p class=''>Divulgada em "+d.toLocaleDateString()+"</p></div></div></a>";
      }
      $(".vagas").append(top);   
    }
  });
}