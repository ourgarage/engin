<?php

use Carbon\Carbon;

function df($date, $format = null)
{
    $dateFormat = !is_null($format) ? $format : conf('settings.site.date_format', trans('settings.date_format'));

    return Carbon::parse($date)->format($dateFormat);
}
