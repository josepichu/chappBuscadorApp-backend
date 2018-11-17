<?php

namespace App\Utils;

class DateTimeUtil {

    /**
     * determina si $date es una fecha correcta según el formato $format
     */
    static public function validateDate($date, $format = 'd/m/Y')
    {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

}