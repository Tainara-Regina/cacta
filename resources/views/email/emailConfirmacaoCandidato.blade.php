@component('mail::message')
<img style="width: 100%" src="https://i.imgur.com/ZaeyxIa.png">
<h2>Olá {{$user->name}}!</h2>
<p>Seja muito bem vindo!</p>
<p>Tenho certeza que vamos te ajudar a encontrar uma vaga bem top.</p>
<p>Clique no botão abaixo para confirmar e continuar seu cadastro.</p>

@component('mail::button',['url' => route('site.confirmacaoCandidato',[$user->id,$user->key])])
Confirmar
@endcomponent
