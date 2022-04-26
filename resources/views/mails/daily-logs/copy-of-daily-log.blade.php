@component('mail::message')
    Just a copy of your daily log

    <br>
    {{ $log }}

    <br>
    Thanks, {{ config('app.name') }}
@endcomponent
