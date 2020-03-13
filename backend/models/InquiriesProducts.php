<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_inquiries_products".
 *
 * @property integer $id
 * @property integer $inquiry_id
 * @property integer $product_id
 * @property integer $qty
 */
class InquiriesProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_inquiries_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inquiry_id', 'product_id', 'qty'], 'required'],
            [['inquiry_id', 'product_id', 'qty'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'inquiry_id' => 'Inquiry ID',
            'product_id' => 'Product ID',
            'qty' => 'Qty',
        ];
    }
}
