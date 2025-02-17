<?php

class ZodiacSign
{
    private static $zodiacSigns = [
        'Овен'       => ['03-21', '04-19'],
        'Телец'      => ['04-20', '05-20'],
        'Близнецы'   => ['05-21', '06-20'],
        'Рак'        => ['06-21', '07-22'],
        'Лев'        => ['07-23', '08-22'],
        'Дева'       => ['08-23', '09-22'],
        'Весы'       => ['09-23', '10-22'],
        'Скорпион'   => ['10-23', '11-22'],
        'Стрелец'    => ['11-23', '12-21'],
        'Козерог'    => ['12-22', '01-19'],
        'Водолей'    => ['01-20', '02-18'],
        'Рыбы'       => ['02-19', '03-20'],
    ];

    public static function getCurrentSign()
    {
        $today = date('m-d');
        return self::getSignByDate($today);
    }

    public static function getSignByDate($date)
    {
        if (!$date) {
            return['error' => 'Date is required'];
        }

        if (!preg_match('/^\d{2}-\d{2}$/', $date)) {
            return ['error' => 'Invalid date format'];
        }

       foreach (self::$zodiacSigns as $sign => $range) {
            if ($date >= $range[0] && $date <= $range[1]) {
                return ['sign' => $sign];
            }
        }
        return ['error' => 'Invalid date'];
    }

    public static function getDatesBySign($sign)
    {
        if (!$sign) {
            return ['error' => 'Sign is required'];
        }

        $sign = ucfirst(strtolower($sign));

        if (isset(self::$zodiacSigns[$sign])) {
            return ['sign' => $sign, 'dates' => self::$zodiacSigns[$sign]];
        }
        return ['error' => 'Invalid sign'];
    }

}
