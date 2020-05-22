@component('mail::message')
<h2>Redefinição de senha</h2>
<p>Clique no botão abaixo para redefinir sua senha.</p>
@component('mail::button',['url' => route('site.redefinir-senha',[$user->key,$user->tipo_cadastro])])
Redefinir senha
@endcomponent


@endcomponent