@component('mail::message')

    # Hey admin
      {{$msg->name }}
      {{$msg->email }}
      {{$msg->msg }}

{{ config('app.name') }}

@endcomponent
