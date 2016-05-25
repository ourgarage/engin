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
        //I don't know that there should be...
    }
    public static function listPackages()
    {
        $packagesList = array_pluck(config('packages'), 'name');
        return $packagesList;
    }
    public static function menuPackages()
    {
        $packagesList = PackageLoaderService::listPackages();
        foreach ($packagesList as $package) {
            if (config()->has('packages.' . $package)) {
                $items[] = [
                    'url' => route(config('packages.' . $package . '.url')),
                    'caption' => config('packages.' . $package . '.caption'),
                    'icon' => config('packages.' . $package . '.icon'),
                    'active' => config('packages.' . $package . '.active'),
                ];
            }
        }
        return $items;
    }
}
