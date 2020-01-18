 $(document).ready(function(){
    $("#buscar").focus(function(){
      $("#topNav").removeClass("sticky-top");
      $("#topNav").addClass("fixed-top");
      $('html, body').animate({scrollTop:90}, 1000);
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
        $('html, body').stop().animate({scrollTop:130}, 1000);
    });


});
