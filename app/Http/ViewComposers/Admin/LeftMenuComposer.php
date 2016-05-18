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
        ];

        $view->with('items', PackageLoaderService::menuPackages());

    }
}
