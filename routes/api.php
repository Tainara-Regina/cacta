<?php

use Illuminate\Http\Request;
use App\CactaUsers;

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




Route::post('/pagarme', function (Request $request) {
	Slack::to('#cacta-vagas')->send('Um postback foi enviado!');
//Slack::to('#cacta-vagas')->send($request->id);

$id             = $request->id; //ID da transação.
$event          = $request->event; //A qual evento o postback se refere. No caso de transações: transaction_status_changed. Já para subscriptions: subscription_status_changed.
$old_status     = $request->old_status; //Status anterior da transação.
$desired_status = $request->desired_status;// Status ideal para objetos deste tipo, em um fluxo normal, onde autorização e captura são feitos com sucesso, por exemplo.
$current_status = $request->current_status;// 	Status para o qual efetivamente mudou.
$object         = $request->object; //Qual o tipo do objeto referido. No caso de transações o valor é 'transaction'. No caso de assinaturas, o valor é 'subscription'
$transaction    = $request->transaction; //Possui todas as informações do objeto. Para acessar objetos internos basta acessar a chave transaction[objeto1][objeto2]. Ex: para acessar o ddd: transaction[phone][ddd] Postback - transação


Slack::to('#cacta-vagas')->send(" ID da transação: ".$id.". Status para o qual efetivamente mudou:  ".$current_status.". Status anterior da transação: ".$old_status.". Qual o tipo do objeto referido: ".$object);

$status = CactaUsers::where('id_assinatura',$id)->first();
$status->status_assinatura = $current_status;
$status->save();



});