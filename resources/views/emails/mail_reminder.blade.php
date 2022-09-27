@component('mail::message')
# Introduction

@component('mail::button', ['url' => ''])
A gentle reminder that your advertisement {{$data['title']}} will be publish at {{$data['start_date']}}
@endcomponent

Thanks,<br>
@endcomponent
