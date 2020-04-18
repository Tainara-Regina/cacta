@component('mail::message')
<h2>Olá {{$user->name}}!</h2>
<p>Clique no link abaixo para confirmar seu cadastro como candidato e continuar seu cadastro</p>
@component('mail::button',['url' => route('site.confirmacaoCandidato',[$user->id,$user->key])])
link de continuação
@endcomponent


@endcomponent