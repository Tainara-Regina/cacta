<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::post('/pagarme', function () {
	return Slack::to('#cacta-vagas')->send('Um postback foi enviado!');
	//return view('site.pagarme');
  // echo 'banana';
  

// $pagarme = new \PagarMe\Client('ak_test_aEZCKKiNyBscZ2DZ3qjy69LB6A46qs');

// $subscription = $pagarme->subscriptions()->getList();

// dd($subscription);







// $transaction = $pagarme->transactions()->create([
//   'amount' => 5200,
//   'payment_method' => 'boleto',
//   'async' => false,
//   'customer' => [
//     'external_id' => '1',
//     'name' => 'Nome do cliente',
//     'type' => 'individual',
//     'country' => 'br',
//     'documents' => [
//       [
//         'type' => 'cpf',
//         'number' => '00000000000'
//       ]
//     ],
//     'phone_numbers' => [ '+551199999999' ],
//     'email' => 'cliente@email.com'
//   ]
// ]);



});