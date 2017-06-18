@component('mail::message')
 # {{$name}} sent you a message

  {{$message}}


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
