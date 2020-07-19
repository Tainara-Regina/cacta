<!DOCTYPE html>
<html>
<head>
	<title>Page Title</title>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://assets.pagar.me/pagarme-js/4.5/pagarme.min.js"></script>
</head>
<body>
	<div id="form">
        Número do cartão: <input type="text" id="card_number"/>
        <br/>
        Nome (como escrito no cartão): <input type="text" id="card_holder_name"/>
        <br/>
        Mês de expiração: <input type="text" id="card_expiration_month"/>
        <br/>
        Ano de expiração: <input type="text" id="card_expiration_year"/>
        <br/>
        Código de segurança: <input type="text" id="card_cvv"/>
        <br/>
        <div id="field_errors">
        </div>
        <br/>
    </div>
    <form id="payment_form" action="https://seusite.com.br/transactions/new" method="POST">
        <input type="submit"></input>
    </form>



    <script type="text/javascript">
      $(document).ready(function() { 
        var form = $("#payment_form")

        form.submit(function(event) {
        //alert('wewe');
        event.preventDefault();
        var card = {} 
        card.card_holder_name = $("#form #card_holder_name").val()
        card.card_expiration_date = $("#form #card_expiration_month").val() + '/' + $("#form #card_expiration_year").val()
        card.card_number = $("#form #card_number").val()
        card.card_cvv = $("#form #card_cvv").val()

        // pega os erros de validação nos campos do form e a bandeira do cartão
        var cardValidations = pagarme.validate({card: card})

        //Então você pode verificar se algum campo não é válido
        if(!cardValidations.card.card_holder_name)
          console.log('Oops, nome invalido')

      if(!cardValidations.card.card_expiration_date)
          console.log('Oops, Data de expiração invalida')

      if(!cardValidations.card.card_number)
          console.log('Oops, número de cartão incorreto')

      if(!cardValidations.card.card_cvv)
          console.log('Oops, número de cvv incorreto')

        //Mas caso esteja tudo certo, você pode seguir o fluxo
        pagarme.client.connect({ encryption_key: 'ek_test_E4PZohjsKo48e95VVjoPhz9RxCseXS' })
        .then(client => client.security.encrypt(card))
        .then(card_hash => console.log(card_hash))
          // o próximo passo aqui é enviar o card_hash para seu servidor, e
          // em seguida criar a transação/assinatura

          return false



// var checkout = new PagarMeCheckout.Checkout({
//   encryption_key: "ENCRYPTION_KEY", 
//   success: function(data) {
//     console.log(data);
//   },
//   error: function(err) {
//     console.log(err);
//   },
//   close: function() {
//     console.log('The modal has been closed');
//   }
// });




})
    });
</script>

</body>
</html>

