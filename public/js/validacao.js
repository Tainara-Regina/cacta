$(document).ready(function() {
    $(document).on('focusout', '.cartao, .date_cartao, .cvv', function() {


      var numero = $('#cartao_id');
      var expira = $('#expira_id'); 
      var cvv =  $('#cvv_id');
      var form = $("#payment_form");

      var passou = true;

      var card = {} 
      card.card_holder_name = $("#form #card_holder_name").val()
      card.card_expiration_date = $(".date_cartao").val()
      card.card_number = $(".cartao").val()
      card.card_cvv = $(".cvv").val()

        // pega os erros de validação nos campos do form e a bandeira do cartão
        var cardValidations = pagarme.validate({card: card})

        //Então você pode verificar se algum campo não é válido
        if(!cardValidations.card.card_holder_name){
          console.log('Oops, nome invalido');
      }


      if(!cardValidations.card.card_expiration_date){
          console.log('Oops, Data de expiração invalida');
          expira.removeClass('acertou');
          expira.addClass('falhou');
          passou = false;
      }else{
         expira.addClass('acertou');
     }


     if(!cardValidations.card.card_number){
        console.log('Oops, número de cartão incorreto')
        numero.removeClass('acertou');
        numero.addClass('falhou');
        passou = false;
    }else{
       numero.addClass('acertou');
   }

   if(!cardValidations.card.card_cvv){
      console.log('Oops, número de cvv incorreto')
      cvv.removeClass('acertou');
      cvv.addClass('falhou');
      passou = false;
  }else{
     cvv.addClass('acertou');
 }
 console.log(passou);
 if (passou == true) {
    return true;
}else{
    return false; 
};


});



    $("form").submit(function(event){
      var numero = $('#cartao_id');
      var expira = $('#expira_id'); 
      var cvv =  $('#cvv_id');
      var form = $("#payment_form");

      var passou = true;

      var card = {} 
      card.card_holder_name = $("#form #card_holder_name").val()
      card.card_expiration_date = $(".date_cartao").val()
      card.card_number = $(".cartao").val()
      card.card_cvv = $(".cvv").val()

        // pega os erros de validação nos campos do form e a bandeira do cartão
        var cardValidations = pagarme.validate({card: card})

        //Então você pode verificar se algum campo não é válido
        if(!cardValidations.card.card_holder_name){
          console.log('Oops, nome invalido');
      }


      if(!cardValidations.card.card_expiration_date){
          console.log('Oops, Data de expiração invalida');
          expira.removeClass('acertou');
          expira.addClass('falhou');
          passou = false;
      }else{
         expira.addClass('acertou');
     }


     if(!cardValidations.card.card_number){
        console.log('Oops, número de cartão incorreto')
        numero.removeClass('acertou');
        numero.addClass('falhou');
        passou = false;
    }else{
       numero.addClass('acertou');
   }

   if(!cardValidations.card.card_cvv){
      console.log('Oops, número de cvv incorreto')
      cvv.removeClass('acertou');
      cvv.addClass('falhou');
      passou = false;
  }else{
     cvv.addClass('acertou');
 }
 console.log(passou);
 if (passou == true) {
    return true;
}else{
    event.preventDefault();
    return false; 
};




});











});
