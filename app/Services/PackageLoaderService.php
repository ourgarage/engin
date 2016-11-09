<?php

namespace App\Services;

class PackageLoaderService
{
    public static function menuPackages()
    {
        $packagesList = array_pluck(config('packages'), 'name');
        foreach ($packagesList as $package) {

            $items[] = config('packages.' . $package . '.menu');
        }

        return $items;
    }

    public static function menuSettings()
    {
        $settingsList = array_pluck(config('packages'), 'name');
        foreach ($settingsList as $settings) {

            if (!is_null(config('packages.' . $settings . '.menu-settings'))) {
                $setting[] = config('packages.' . $settings . '.menu-settings');
            }
        }

        return $setting;
    }
}
