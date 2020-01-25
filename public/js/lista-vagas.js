 $(document).ready(function(){
 	$("#buscar").focus(function(){
 		$('html, body').animate({scrollTop:80}, 1000);
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
 		$('html, body').stop().animate({scrollTop:130}, 850);
 	});


 });
