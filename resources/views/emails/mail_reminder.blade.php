{{-- @component('mail::message')
# Introduction
Hello {{$data['name']}} , <br>
A gentle reminder that you have {{count($data['ads'])}} Advertisement in progress
@component('mail::button', ['url' => ''])

<ul>
    @foreach ( $data['ads'] as  $ad)
        <li> {{ $ad->title}} , at {{$ad->start_date}}</li>
    @endforeach
</ul>
@endcomponent

Thanks,<br>
@endcomponent --}}
