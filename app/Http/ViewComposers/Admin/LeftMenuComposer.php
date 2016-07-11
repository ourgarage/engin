<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\Contracts\View\View;
use App\Services\PackageLoaderService;

class LeftMenuComposer
{

    public function compose(View $view)
    {
        $items = [
            [
                'url' => route('index-admin'),
                'caption' => 'Dashboard',
                'icon' => 'fa fa-th',
                'active' => 'index-admin',
            ],

            [
                'url' => route('admin-site-get-settings'),
                'caption' => 'Site Settings',
                'icon' => 'fa fa-cog',
                'active' => 'admin-site-get-settings',
            ],
        ];

        $packageItems = PackageLoaderService::menuPackages();
        $items = array_merge_recursive($items, $packageItems);
        
        $view->with(['items' => $items, 'user' => auth()->user()]);
    }
}
