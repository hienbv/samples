<?php

include './Singleton.php';
include './FactoryMethod.php';

//echo Singleton::getInstance()->getName();
//$creator = new ConcreteCreator();
//echo $creator->anOperation();

/**
 * Determine the start and end dates for
 * the week in which the specified date
 * falls
 *
 * @param datetime $date 
 * @param string $format 'Y/m/d H:i:s'
 * @param int $weekStart 0 - Sun, 1 - Mon...
 * 
 * @return array [start_date_of_week, end_date_of_week]
 * 
 * @author   HienBV <hienbv@rikkeisoft.com>
 * @version  1.0
 */
function weekBounds($date = null, $format = 'Y/m/d', $weekStart = 1) 
{
    if (empty($date)) {
        $date = date($format);
    }

    $ts = strtotime($date);
    $start = (date('w', $ts) == $weekStart) ? $ts : strtotime('last monday', $ts);
    $start_date = date($format, $start);
    $end_date = date($format, strtotime('next sunday', $start));

    return [$start_date, $end_date];
}
