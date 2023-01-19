@component('mail::message')
**Hi {{ $receiver['name'] }}**,

A new version of the knowledge software has been releases.

@component('mail::button', ['url' => 'https://github.com/michaelravedoni/knowledge/releases'])
View releases at GitHub
@endcomponent

Best regards,<br>
{{ config('app.name') }}
@endcomponent
