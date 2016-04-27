<p>{{ $user->name }}, congratulations on your successful registration on (ВСТАВИТЬ НАЗВАНИЕ САЙТА ИЗ КОНФИГА, ПОКА
    НЕ СМЕРДЖЕНО).</p>
<p>For full use of all resources, please confirm your email address by clicking on the link</p>

<a href="{{ route('register.confirmation', $hash) }}">
    <span>Confirm email</span>
</a>

<p>
    Unless you were the initiator of registering on the site <a href="{{ route('index') }}">ВСТАВИТЬ НАЗВАНИЕ</a>, then no response from you is not
    required
</p>
