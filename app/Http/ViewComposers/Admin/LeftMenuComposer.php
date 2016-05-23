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

        $view->with(['items' => $items, 'user' => auth()->user()]);
    }
}
