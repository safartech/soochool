

@component('mail::message')
# Introduction

- one
- two
- three

The body of your message.


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

@component('mail::panel', ['url' => ''])
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, ullam!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
