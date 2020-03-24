@component('mail::message')
<h2>Olá {{$user->name}}!</h2>
<p>Clique no link abaixo para confirmar seu e continuar seu cadastro</p>
@component('mail::button',['url' => route('site.confirmacaoContratante',[$user->id,$user->key])])
link de continuação
@endcomponent


@endcomponent