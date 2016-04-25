<div class="alert alert-dismissible alert-warning @If(Notifications::byType('danger')->count() <= 0) hidden @endif">

    <button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>

    <p>WARNING | ERRORS</p>

    <ul>

        @foreach(Notifications::byType('danger')->get() as $a_error)

            <li>{{$a_error['message']}}</li>

        @endforeach

    </ul>

</div>
