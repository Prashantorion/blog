<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_booked_master".
 *
 * @property integer $id
 * @property string $booking_id
 * @property integer $flat_id
 * @property double $basic_rate
 * @property double $floor_rise
 * @property double $premium_charges
 * @property double $development_charges
 * @property double $maintenance_funds
 * @property double $service_tax
 * @property double $vat
 * @property double $stamp_duty
 * @property double $registration_fees
 * @property double $total
 * @property integer $added_by
 * @property string $created_date
 * @property string $updated_date
 * @property integer $updated_by
 */
class Alert extends \yii\db\ActiveRecord
{

    const ERROR = 1;
    const SUCCESS = 2;
    const ALERT = 3;

    public $type;
    public $message;
    public $back;
    public $url;
    public $isNewTab;

    const TYPE_INFO = 'info';
    const TYPE_DANGER = 'danger';
    const TYPE_SUCCESS = 'success';
    const TYPE_WARNING = 'warning';
    const TYPE_GROWL = 'growl';
    const TYPE_MINIMALIST = 'minimalist';
    const TYPE_PASTEL = 'pastel';
    const TYPE_CUSTOM = 'custom';
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'message', 'back', 'url', 'isNewTab'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        ];
    }
}
