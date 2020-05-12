 
if( typeof document['referrer'] !== 'undefined' ) { 
    //Seu browser suporta document.referrer
    var url_anterior = document.referrer;
    var contem = url_anterior.indexOf("admin-candidato");
}else{
	var contem = false;
}


if (contem == -1) {
	$(document).ready(function(){
		$('html, body').stop().animate({scrollTop:600}, 800);
	});
}




// $(document).ready(function(){
// 	$("#buscar").focus(function(){
// 		$('html, body').animate({scrollTop:80}, 1000);
// 		$("#filtro").addClass("d-block");
// 		$(".conteudo-pesquisa").css("height","100%");
// 	});

// 	$("#filtrar").change(function() {
// 		if(this.checked) {
// 			$("#filtro-mobile").css("display","block");
// 		}
// 		if(!this.checked) {
// 			$("#filtro-mobile").css("display","none");
// 		}
// 	});

// 	$("#buscar").keyup(function(){ 
// 		$('html, body').stop().animate({scrollTop:130}, 850);
// 	});

// });




//faz busca de vagas no on focus e on change
// $(document).ready(function(){
// 	$('#buscar').on('keyup keypress blur change focus', function(e) {
//   	//alert('testes');
//   	$.post("/vagas-ajax",
//   	{
//   		buscar:  $("#buscar").val(),
//   	},
//   	function(data, status){
//   		$(".vagas").html("");
//   		for (var i = 0; i < data.length; i++) {

//   			var top = "<a href='/vaga/"+data[i].id+"'><div class='row  text-center py-3' style='border-bottom: 1px solid #bdbdbd'><div class='col d-none d-sm-block'><img width='80px' src='storage/"+data[i].logo+"'></div><div class='col'><p><b>"+data[i].titulo+"</b></p><p>"+data[i].nome_empresa+"</p></div><div class='col'><p><b>"+data[i].contratacao+"</b></p><p>"+data[i].localidade+"</p></div>";

//   			var d = new Date(data[i].data_de_criacao);

//   			if(data[i].vaga_em_destaque == 'on'){
//   				top += "<div class='col mt-4'><p><span class='vaga-destaque'>Destaque</span></p></div></div></a>";
//   			}else{
//   				top += "<div class='col mt-4'><p class=''>Divulgada em "+d.toLocaleDateString()+"</p></div></div></a>";
//   			}
//   			$(".vagas").append(top);   
//   		}
//   	});
//   });
// });




// $(document).ready(function(){
// 	$.post("/vagas-ajax",
// 	{
// 		buscar:  $("#buscar").val(),
// 	},
// 	function(data, status){
// 		$(".vagas").html("");
// 		for (var i = 0; i < data.length; i++) {

// 			var top = "<a href='/vaga/"+data[i].id+"'><div class='row  text-center py-3' style='border-bottom: 1px solid #bdbdbd'><div class='col d-none d-sm-block'><img width='80px' src='storage/"+data[i].logo+"'></div><div class='col'><p><b>"+data[i].titulo+"</b></p><p>"+data[i].nome_empresa+"</p></div><div class='col'><p><b>"+data[i].contratacao+"</b></p><p>"+data[i].localidade+"</p></div>";

// 			var d = new Date(data[i].data_de_criacao);

// 			if(data[i].vaga_em_destaque == 'on'){
// 				top += "<div class='col mt-4'><p><span class='vaga-destaque'>Destaque</span></p></div></div></a>";
// 			}else{
// 				top += "<div class='col mt-4'><p class=''>Divulgada em "+d.toLocaleDateString()+"</p></div></div></a>";
// 			}
// 			$(".vagas").append(top);   
// 		}
// 	});

// });


$(document).ready(function(){
  buscaVaga();  
	$("#filtrar").change(function() {
		if(this.checked) {
			$("#filtro-mobile").css("display","block");
		}
		if(!this.checked) {
			$("#filtro-mobile").css("display","none");
		}
	});


	$(document).on('click','#load_more_button',function(){
		$('#load_more_button').html('<b>Carregando...</b>');
		$.post("/vagas-ajax",
		{
			buscar:  $("#buscar").val(),
			skip:  $("#load_more_button").data("id"),
		},
		function(data, status){

			$('#load_more_button').remove();
			$(".vagas").append(data);
		});
	});

});




// $(document).ready(function(){
// 	$.post("/vagas-ajax",
// 	{
// 		buscar:  $("#buscar").val(),
// 	},
// 	function(data, status){
// 		$(".vagas").html("");
// 		$(".vagas").append(data);
// 	});

	
// 	$('#buscar').on('keyup keypress blur change focus', function(e) {
//   	//alert('testes');
//   	$.post("/vagas-ajax",
//   	{
//   		buscar:  $("#buscar").val(),
//   	},
//   	function(data, status){
//   		$(".vagas").html("");
//   		$(".vagas").append(data);
//   	});
//   });



// });




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

	console.log(area);
	console.log(regime);
	console.log(local);

	$.post("/vagas-ajax",
	{
		buscar:  $("#buscar").val(),
		area: area,
		regime: regime,
		local: local
	},
function(data, status){
  		$(".vagas").html("");
  		$(".vagas").append(data);
	 $("#encontramos").html("Encontramos: <b>"+ $("#total_value").val() +"</b> vagas");
  	});
}