@component('mail::message')
# Introduction

{!! $message !!}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
