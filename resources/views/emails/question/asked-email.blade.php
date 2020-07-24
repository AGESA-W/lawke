@component('mail::message')
# Hello!

A question in your practice area has been asked by a client on legalmeet.

Responding to a question increases your chances of expanding your client base.
@component('mail::button', ['url' => ''])
View question
@endcomponent

Thank you for using our application!<br>
Regards,<br>
{{ config('app.name') }}
@endcomponent
