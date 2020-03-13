<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class Email extends Model
{
    public $toEmail;
    public $desc;

       /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['toEmail', 'desc'], 'safe'],
        ];
    }

}
