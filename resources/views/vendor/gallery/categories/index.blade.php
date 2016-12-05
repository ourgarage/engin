@extends('admin.main')

@section('body-title')
    {{ trans('gallery::gallery.admin.categories-index.title') }}

    <a href="{{ route('gallery::categories::create') }}" class="btn btn-success pull-right">
        <i class="fa fa-plus"></i> {{ trans('gallery::gallery.admin.button.create') }}
    </a>
@endsection

@section('body')
    <div>
        @if(!$categories->isEmpty())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="col-xs-1">Id</th>
                        <th>{{ trans('gallery::gallery.admin.categories-index.table.name') }}</th>
                        <th>{{ trans('gallery::gallery.admin.categories-index.table.descriptions') }}</th>
                        <th class="col-xs-1">{{ trans('gallery::gallery.admin.categories-index.table.icon') }}</th>
                        <th class="col-xs-1">{{ trans('gallery::gallery.admin.categories-index.table.pictures') }}</th>
                        <th class="col-xs-1">{{ trans('gallery::gallery.admin.categories-index.table.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($categories as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td><span data-toggle="tooltip" data-placement="top" title="{{ $category->description }}">
                                    {{ str_limit($category->description, 50, '...') }}
                                </span></td>
                            <td><i class="{{ $category->icon }} fa-lg"></i></td>
                            <td>{{ '----' }}</td>
                            <td>
                                <a href="{{ route('gallery::categories::edit', $category->id) }}"
                                   class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top"
                                   title="{{ trans('gallery::gallery.admin.button.tooltip.edit') }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="{{ route('gallery::categories::destroy', $category->id) }}"
                                   class="btn btn-danger btn-xs" onclick="return buttonConfirmation(event, 'Delete?')"
                                   data-toggle="tooltip" data-placement="top"
                                   title="{{ trans('gallery::gallery.admin.button.tooltip.remove') }}">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="no-results text-center">
                <i class="fa fa-tags fa-3x"></i>
                <p>{{ trans('gallery::gallery.admin.categories-index.empty') }}</p>
            </div>
        @endif
    </div>
@endsection

