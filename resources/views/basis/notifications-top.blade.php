@If(Notifications::byGroup('top')->has())
    <div class="notification-top text-center">
        {!! Notifications::byGroup('top')->toHTML() !!}
    </div>
@endif
