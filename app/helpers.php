<?php

use Carbon\Carbon;
use App\Constant\Dates;

/**
 * @param string $date
 * @param string $format
 * @return date
 */
function df($date, $format = Dates::FORMAT_LONG)
{
    $date = Carbon::parse($date);
    if ($format === Dates::TYPE_AGO) {
        Carbon::setLocale(app()->getLocale());

        return $date->diffForHumans();
    }

    $mapping = [
        Dates::FORMAT_LONG => 'date.format.long.php',
        Dates::FORMAT_SHORT => 'date.format.short.php',
        Dates::FORMAT_FULL => 'date.format.full.php',
        Dates::FORMAT_TIME => 'date.format.time.php',
    ];

    $key = isset($mapping[$format]) ? $mapping[$format] : $mapping[Dates::FORMAT_LONG];

    return $date->format(trans($key));
}
