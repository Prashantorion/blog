<?php
namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class Filters extends Model
{
    public $start_date;
    public $end_date;
    public $type;

       /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_date', 'end_date','type'], 'required'],
            [['start_date', 'end_date','type'], 'safe'],
        ];
    }

}
