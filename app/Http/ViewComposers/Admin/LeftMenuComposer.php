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

        ];

        $packages = ['static-pages'];

        foreach ($packages as $package) {

            if (config()->has($package)) {

                $items[] = [
                    'url' => route(config($package . '.url')),
                    'caption' => config($package . '.caption'),
                    'icon' => config($package . '.icon'),
                    'active' => config($package . '.active'),
                ];

            }

        }

        $view->with('items', $items);
    }
}
