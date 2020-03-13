<?php


namespace backend\custom;

use Yii;
use yii\widgets\ActiveForm;

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
                    ->setFrom(['noreply@brasslineindia.com'=>'Brasslineindia'])
                    ->setTo($to)
                    ->setBcc(array('wagtaildevelopment@gmail.com'))
                    ->setSubject($subject)
                    ->setHtmlBody($body)
                    ->send();
    }

    public static function validateModel($model)
    {
        $errorData = ActiveForm::validate($model);

        $errorStr = "";

        $errorKeys = array_keys($errorData);
        for($j=0;$j<count($errorData);$j++)
        {
            $errorStr = $errorStr . $errorData[$errorKeys[$j]][0] . '~';

        }
        
        return $errorStr;
    }


}
