@component('mail::message')

Hi {{$name}}. We've recived your application to be a part of the plenary meeting. For more details we will keep you informed.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
