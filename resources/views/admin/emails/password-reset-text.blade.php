<p>
    {{ trans('email.password-reset.title') }}
</p>


<p>{{ trans('email.password-reset.description') }}</p>

<a href="{{ route('password-reset', [$email, $token]) }}">
    <span>
        {{ trans('email.password-reset.link-for-reset') }}
    </span>
</a>

<p>
    {!! trans('email.password-reset.footer', ['link' => route('index'), 'site' => config('project-values.name_full')]) !!}
</p>
