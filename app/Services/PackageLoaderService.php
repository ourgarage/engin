<?php

namespace App\Services;

/**
 * i don't know, need it or not..
 * use Illuminate\Contracts\Container\Container;
 */

class PackageLoaderService
{

    function __construct()
    {
        //i don't know, need it or not..
    }

    public static function listPackages()
    {
        $path = base_path('vendor/ourgarage');
        $packages = array_diff(scandir($path, 1), ['..', '.']);
        return $packages;
    }

    public static function menuPackages()
    {
        $packages = PackageLoaderService::listPackages();
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
        return $items;
    }

}
