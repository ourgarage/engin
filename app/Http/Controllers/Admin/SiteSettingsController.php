<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SiteSettingsController extends Controller
{
    public function __construct()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
    }

    public function getSettings()
    {
        \Title::append(trans('settings.index.title'));

        //$siteName = conf('settings.site.name', 'Gitios');
        //dd ($siteName);

        return view('admin.settings.index');
    }

    public function setSettings()
    {

    }
}
