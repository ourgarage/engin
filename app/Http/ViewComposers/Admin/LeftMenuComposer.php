<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\Contracts\View\View;

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
                'url' => route(config('static-pages.url')),
                'caption' => config('static-pages.caption'),
                'icon' => config('static-pages.icon'),
                'active' => config('static-pages.active'),
            ],
        ];

        $view->with('items', $items);
    }
}