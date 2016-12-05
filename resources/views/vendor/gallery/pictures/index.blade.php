@extends('admin.main')

@section('body-title')
    {{ trans('gallery::gallery.admin.pictures-index.title') }}

    <a href="{{ route('gallery::pictures::create') }}" class="btn btn-success pull-right">
        <i class="fa fa-plus"></i> {{ trans('gallery::gallery.admin.button.add') }}
    </a>
@endsection

@section('body')
    <div>
        @if(!$pictures->isEmpty())

        @else
            <div class="no-results text-center">
                <i class="fa fa-picture-o fa-3x"></i>
                <p>{{ trans('gallery::gallery.admin.pictures-index.empty') }}</p>
            </div>
        @endif
    </div>
@endsection

