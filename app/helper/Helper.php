<?php
namespace App\helper;

use DateTime;



class Helper {

    public static function  calBetweenDate($date)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $OldDate = new DateTime($date);
        $now = new DateTime(Date('Y-m-d H:i:s'));
        $calDate = $OldDate->diff($now);

        if($calDate->y!=0){
            return $calDate->y.' năm trước';
        }
        if($calDate->m!=0){
            return $calDate->m.' tháng trước';
        }
        if($calDate->d!=0){
           return $calDate->d.' ngày trước';
        }
        if($calDate->h!=0){
            return  $calDate->h.' giờ trước';
        }
        if($calDate->i!=0){
            return $calDate->i.' phút trước';
        }
        if($calDate->s!=0){
           return  $calDate->s.' giây trước';
        }
    }
    public static function formatPhoneNumber($phoneNumber) {
        $phoneNumber = preg_replace('/[^0-9]/','',$phoneNumber);

        if(strlen($phoneNumber) > 10) {
            $countryCode = substr($phoneNumber, 0, strlen($phoneNumber)-10);
            $areaCode = substr($phoneNumber, -10, 3);
            $nextThree = substr($phoneNumber, -7, 3);
            $lastFour = substr($phoneNumber, -4, 4);

            $phoneNumber = '+'.$countryCode.' '.$areaCode.'.'.$nextThree.'.'.$lastFour;
        }
        else if(strlen($phoneNumber) == 10) {
            $areaCode = substr($phoneNumber, 0, 3);
            $nextThree = substr($phoneNumber, 3, 3);
            $lastFour = substr($phoneNumber, 6, 4);

            $phoneNumber = $areaCode.'.'.$nextThree.'.'.$lastFour;
        }
        else if(strlen($phoneNumber) == 7) {
            $nextThree = substr($phoneNumber, 0, 3);
            $lastFour = substr($phoneNumber, 3, 4);

            $phoneNumber = $nextThree.'-'.$lastFour;
        }

        return $phoneNumber;
    }
}
?>