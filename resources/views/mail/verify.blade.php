@component('mail::message')
<h2 class="text-success">VERIFY EMAIL</h2>


@component('mail::button', ['url' => $url, 'color' => 'primary'])
        Verify
@endcomponent


Thank you and stay safe!
@endcomponent
