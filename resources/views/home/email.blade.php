<h1>Forexustaad Subscribers</h1>
<p>Please confirm your subsriction by clicking the following link</p>
@php $email = base64_encode($details->email)  @endphp
<a href="{{URL::to('subscriberConfirmation')}}/{{$email}}">
    Click to login Forexustaad
</a>