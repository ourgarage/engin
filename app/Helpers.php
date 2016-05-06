<?php

use Jenssegers\Date\Date;

//Date Format 'd M Y' (1 Dec 2005)

function dateFormat_dMY($date)
{
    return Date::parse($date)->format('d M Y');
}