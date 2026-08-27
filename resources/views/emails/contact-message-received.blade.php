<x-mail::message>
# New contact message

A new message was submitted on the {{ config('app.name') }} website.

**Subject:** {{ $messageRecord->subject }}  
**From:** {{ $messageRecord->name }} ({{ $messageRecord->email }})  
@if ($messageRecord->company)
**Company:** {{ $messageRecord->company }}  
@endif
@if ($messageRecord->phone)
**Phone:** {{ $messageRecord->phone }}  
@endif

**Message**

{{ $messageRecord->message }}

<x-mail::button :url="$adminUrl">
View in admin
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
