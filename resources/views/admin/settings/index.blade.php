@extends('admin.main')

@section('body-title')

    {{ trans('settings.index.title') }}

@endsection

@section('body')

    <div class="settings-index">

        @include('admin.basis.notifications-page')

        <div class="login-box-body">

            <form class="form-horizontal" action="{{ route('admin-site-save-settings') }}" method="POST">
                {!! csrf_field() !!}

                <div class="form-group has-feedback">
                    <div class="col-md-2">
                        {{ trans('settings.fields.site-name') }} :
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="site_name" class="form-control"
                               value="{{ conf('settings.site.name', config('site.default.name')) }}">
                        <span class="glyphicon glyphicon-header form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-2">
                        {{ trans('settings.fields.domain') }} :
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="domain" class="form-control"
                               value="{{ conf('settings.site.domain', config('site.default.domain')) }}">
                        <span class="glyphicon glyphicon-globe form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-2">
                        {{ trans('settings.fields.slogan') }} :
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="slogan" class="form-control"
                               value="{{ conf('settings.site.slogan', config('site.default.slogan')) }}">
                        <span class="glyphicon glyphicon-flag form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-2">
                        {{ trans('settings.fields.copyright') }} :
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="copyright" class="form-control"
                               value="{{ conf('settings.site.copyright', config('site.default.copyright')) }}">
                        <span class="glyphicon glyphicon-copyright-mark form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-2">
                        {{ trans('settings.fields.meta-keywords') }} :
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="meta_keywords" class="form-control"
                               value="{{ conf('settings.site.meta-keywords', config('site.default.meta-keywords')) }}">
                        <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-2">
                        {{ trans('settings.fields.meta-description') }} :
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="meta_description" class="form-control"
                               value="{{ conf('settings.site.meta-description', config('site.default.meta-description')) }}">
                        <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-2">
                        {{ trans('settings.fields.meta-title') }} :
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="meta_title" class="form-control"
                               value="{{ conf('settings.site.meta-title', config('site.default.meta-title')) }}">
                        <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-flat">{{ trans('settings.button.save') }}</button>

            </form>

        </div>

    </div>

@endsection

@section('css')
    <link href='/css/settings.css' rel='stylesheet' type='text/css'>
@endsection
