@component('mail::message')
# Hello!

The question you asked on legalmeet has been answered.

@component('mail::button', ['url' => '{{route('question.answer')}}'])
View answer
@endcomponent

Thank you for using our application!<br>
Regards,<br>
{{ config('app.name') }}
@endcomponent
