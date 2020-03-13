<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class ContactForm extends Model
{
    public $full_name;
    public $email_address;
    public $mobile_number;
    public $message;

       /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_name','email_address','mobile_number','message'],'required'],
            [['full_name','email_address'], 'string', 'max' => 100],
            [['message'], 'string', 'max' => 1000],
            [['email_address'], 'email'],
            [['mobile_number'], 'integer'],
        ];
    }

}
