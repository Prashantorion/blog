<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class Search extends Model
{
    public $string;

       /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['string'], 'safe'],
        ];
    }

}
