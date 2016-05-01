@If(Notifications::byGroup('top')->has())
    <p>
        {!! Notifications::byGroup('top')->toHTML() !!}
    </p>
@endif
