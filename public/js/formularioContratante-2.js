

if ($('#plano').val() != "") {
	$('[data-plano='+$('#plano').val()+']').css('border','4px solid green');
}

$(".plano").click(function(){
// passar o valor como parametro para saber o plano que foi escolhido

$('.plano').css('border','none');
$(this).css('border','4px solid green');
$('#plano').val($(this).attr("data-plano"));

});




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
