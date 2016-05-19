<?php

use Jenssegers\Date\Date;

//Date Format 'd M Y' (1 Dec 2005)

function df($date, $format = 'd M Y')
{
    return Date::parse($date)->format($format);
}
