@component('mail::message')
# New message

{{$contact->message}}

@component('mail::panel')
{{$contact->name}}
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
