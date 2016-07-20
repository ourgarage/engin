<?php

namespace App\Services;

class PackageLoaderService
{
    public static function menuPackages()
    {
        $packagesList = array_pluck(config('packages'), 'name');
        foreach ($packagesList as $package) {
            $items[] = [
                'url' => route(config('packages.' . $package . '.url')),
                'caption' => config('packages.' . $package . '.caption'),
                'icon' => config('packages.' . $package . '.icon'),
                'active' => config('packages.' . $package . '.active'),

                'settings' => [
                    'url' => config('packages.' . $package . '.settings.url'),
                    'caption' => config('packages.' . $package . '.settings.caption'),
                    'icon' => config('packages.' . $package . '.settings.icon'),
                    'active' => config('packages.' . $package . '.settings.active'),
                ],
            ];
        }

        return $items;
    }
}
