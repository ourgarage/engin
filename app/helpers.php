<?php

use Carbon\Carbon;

/**
 * Short default date format (e.g. 2016-12-31)
 *
 * @param $date
 * @param null $format
 * @return string
 */
function df($date, $format = null)
{
    $format = $format ?: conf('settings.site.date_format', trans('settings.date_format'));

    return Carbon::parse($date)->format($format);
}

/**
 * Long default date format (e.g. 2016-12-31 23:59:59)
 *
 * @param $date
 * @param null $format
 * @return string
 */
function tf($date, $format = null)
{
    $format = $format ?: conf('settings.site.date_format', trans('settings.date_format')).' H:i:s';

    return Carbon::parse($date)->format($format);
}
