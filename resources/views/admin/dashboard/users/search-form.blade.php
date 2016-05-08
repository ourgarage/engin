<div class="search-form">
    <form action="{{ route('users-search-admin') }}" method="GET">
        <div class="input-group col-xs-12 col-md-6">
            <input type="text" name="email" class="form-control"
                   value="{{ app('request')->input('email') }}" placeholder="{{ trans('users.search.placeholder') }}">
            <span class="input-group-btn">
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
</div>
