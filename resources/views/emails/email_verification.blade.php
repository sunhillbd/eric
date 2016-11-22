<p>
    Mr {{ $name }}
</p>
Thanks for creating an account with the verification demo app.
<p>
    If your email is {{ $email }},
</p>
Please follow the link below to verify your email address



<a href="{!! route('auth.activate',[$activationCode]) !!}">Please confirm your registration </a>