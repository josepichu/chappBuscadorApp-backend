<?php

namespace App\Utils;

class DateTimeUtil {

    /**
     * determina si $date es una fecha correcta según el formato $format
     */
    static public function validateDate($date, $format = 'Y-m-d')
    {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

}