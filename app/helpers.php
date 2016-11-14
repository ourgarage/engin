<?php

use Carbon\Carbon;

//Default date format 'Y-m-d' (2016-11-14)

function df($date, $format = null)
{
    $format = $format ?: conf('settings.site.date_format', config('site.date_format'));

    return Carbon::parse($date)->format($format);
}
