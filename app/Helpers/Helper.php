<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

if (!function_exists('distance')) {
    function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
          return 0;
        }
        else {
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);

          if ($unit == "K") {
            return ($miles * 1.609344);
          } else if ($unit == "N") {
            return ($miles * 0.8684);
          } else {
            return $miles;
          }
        }
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date, string $format = 'Y/m/d')
    {
        if(!empty($date)) {
            $date = new DateTime($date);
            return $date->format($format);
        }
        return '';
    }
}

if (!function_exists('chkTimeValid')) {
    function chkTimeValid($datetime, $arrDateTime=array())
    {
        $startDtInput = date_format(new DateTime($datetime), 'YmdHi');
        if(count($arrDateTime) > 0) {
           foreach($arrDateTime as $dt) {
               $startDateTime = date_format(new DateTime($dt->start_time), 'YmdHi');
               $endDateTime = date_format(new DateTime($dt->end_time), 'YmdHi');

               if ( $startDtInput > $startDateTime &&
                $startDtInput < $endDateTime ){
                return false;
              } else {
                return true;
              }
           }
        }
        return true;
    }
}
