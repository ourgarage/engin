@If(Notifications::byGroup('page')->has())

<ul>
    @foreach(Notifications::byGroup('page')->get() as $error)
        <li>{!! $error['message'] !!}</li>
    @endforeach
</ul>
@endif
