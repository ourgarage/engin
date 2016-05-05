@If(Notifications::byGroup('page')->has())
    <div class="notification-page">
        {!! Notifications::byGroup('page')->toHTML() !!}
    </div>
@endif
