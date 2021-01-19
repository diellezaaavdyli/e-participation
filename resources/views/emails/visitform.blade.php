@component('mail::message')

Hi {{$name}}. We've recived your application to visit the asseamby. For more details we will keep you informed.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
