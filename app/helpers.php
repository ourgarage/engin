<?php

use Carbon\Carbon;
use App\Constant\Dates;

/**
 * @param date $date
 * @param string $format
 * @return date
 */
function df($date, $format = Dates::FORMAT_LONG)
{
    $mapping = [
        Dates::FORMAT_LONG => 'date.format.long.php',
        Dates::FORMAT_SHORT => 'date.format.short.php',
        Dates::FORMAT_FULL => 'date.format.full.php',
        Dates::FORMAT_TIME => 'date.format.time.php',
        Dates::TYPE_AGO => 'ago',
    ];

    $key = isset($mapping[$format]) ? $mapping[$format] : $mapping[Dates::FORMAT_LONG];

    if ($key === Dates::TYPE_AGO) {
        Carbon::setLocale(app()->getLocale());

        return Carbon::parse($date)->diffForHumans();
    }

    return Carbon::parse($date)->format(trans($key));


}
