<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Notifications;
use App\Http\Requests\AdminSiteSettingsRequest;

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

    public function saveSettings(AdminSiteSettingsRequest $request)
    {

        $config = [
            'settings' => [
                'site' => [
                    'name' => request('site_name'),
                    'domain' => request('domain'),
                    'slogan' => request('slogan'),
                    'copyright' => request('copyright'),
                    'meta-keywords' => request('meta_keywords'),
                    'meta-description' => request('meta_description'),
                    'meta-title' => request('meta_title')
                ]
            ]
        ];

        conf()->put($config);
        Notifications::success(trans('settings.message.success'), 'top');

        return redirect()->route('admin-site-get-settings');
    }
}
