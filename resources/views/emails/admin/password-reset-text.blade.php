<p>
    Password reset
</p>


<p>Click here to reset your password</p>

<a href="{{ route('password-reset', [$email, $token]) }}">
    <span>
        Reset
    </span>
</a>

<p>
    Unless you were the initiator of password reset on the site <a href="{{ route('index') }}">ВСТАВИТЬ НАЗВАНИЕ</a>,
    then no response from you is not
    required
</p>
