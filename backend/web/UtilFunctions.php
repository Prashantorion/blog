<?php


namespace backend\custom;

use Yii;

class UtilFunctions
{

    public static function convertNormalDateToPhp($dateStr)
    {
        yii::trace('Into convertNormalDateToPhp '.$dateStr);

        $dateArr = explode('/',$dateStr);

       return $dateArr[2].'/'.$dateArr[1].'/'.$dateArr[0];
    }
	
    public static function convertPhpToNormalDate($dateStr)
    {
        return date('d/m/Y',strtotime($dateStr));
    }

    public static function getRandomString($length)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $password = '';
         for ($j = 0; $j < $length; $j++) {
              $password .= $characters[rand(0, strlen($characters) - 1)];
         }

         return $password;
    }

    public static function sendEmail($to,$subject,$body)
    {     
                    Yii::$app->mailer->compose()
                    ->setFrom('info@tajir.com')
                    ->setTo($to)
                    ->setSubject($subject)
                    ->setHtmlBody($body)
                    ->send();
    }

}
