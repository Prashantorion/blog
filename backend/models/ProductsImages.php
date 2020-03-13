<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_products_images".
 *
 * @property integer $id
 * @property integer $prod_id
 * @property string $prod_image
 * @property string $type
 */
class ProductsImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_products_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prod_id'], 'required'],
            [['prod_id'], 'integer'],
            [['prod_image'], 'file','maxFiles'=>20],
            [['type'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prod_id' => 'Product ID',
            'prod_image' => 'Product Image',
            'type' => 'Type',
        ];
    }
}
