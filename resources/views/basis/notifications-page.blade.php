@If(Notifications::byGroup('page')->has())
    {!! Notifications::byGroup('page')->toHTML() !!}
@endif
