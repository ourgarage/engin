<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Notifications;

class SiteSettingsController extends Controller
{
    public function __construct()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
    }

    public function getSettings()
    {
        \Title::append(trans('settings.index.title'));

        return view('admin.settings.index');
    }

    public function setSettings()
    {
        $config = [
            'settings.site.name' => request('site_name'),
            'settings.site.domain' => request('domain'),
            'settings.site.slogan' => request('slogan'),
            'settings.site.copyright' => request('copyright'),
            'settings.site.meta-keywords' => request('meta_keywords'),
            'settings.site.meta-description' => request('meta_description'),
            'settings.site.meta-title' => request('meta_title'),
        ];

        $config = array_diff($config, ['']);
        conf()->put($config);
        Notifications::success(trans('settings.message.success'), 'top');

        return redirect()->route('admin-site-get-settings');
    }
}
