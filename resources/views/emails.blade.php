<x-mail::message>
# New login from {{$ip}} on {{$userAgent}}

We noticed a login to your account from a new device. Was this you?

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
