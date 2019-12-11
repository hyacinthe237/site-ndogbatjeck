@extends('backend.layouts.auth')


@section('head')
    <title>{{ config('app.name') }} | Password request</title>
@endsection


@section('content')
<section class="login-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
    <p>We just emailed you a link
Please check your email and click the secure link</p>

<p>If you don’t see our email, check your spam folder or get troubleshooting tips

Lost access to your email? Verify your identity</p>

			</div>
		</div>
	</div>
</section>

@endsection
