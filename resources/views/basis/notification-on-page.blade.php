<div class="alert alert-dismissible alert-warning @If(Notifications::byGroup('page')->count() <= 0) hidden @endif">
    <button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
    <ul>
        @foreach(Notifications::byGroup('page')->get() as $a_error)
            <li>{!! $a_error['message'] !!}</li>
        @endforeach
    </ul>
</div>
