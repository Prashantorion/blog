<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_sub_categories".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property integer $type_id
 * @property string $sub_cat_name
 * @property string $sub_cat_desc
 * @property string $created_date
 * @property integer $added_by
 * @property integer $updated_by
 * @property string $updated_date
 * @property integer $is_deleted
 * @property string $deleted_date
 * @property integer $deleted_by
 * @property string $sub_cat_image
 * @property integer $order_id
 */
class SubCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return 'tbl_sub_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'sub_cat_name', 'added_by'], 'required'],
            [['cat_id','added_by', 'updated_by', 'is_deleted', 'deleted_by', ], 'integer'],
            [['created_date', 'updated_date', 'deleted_date'], 'safe'],
            [['sub_cat_name',], 'string', 'max' => 200],
            [['sub_cat_image', ], 'file'],
            [['sub_cat_desc'], 'string', 'max' => 2000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'Select Category',
            'type_id' => 'Type ID',
            'sub_cat_name' => 'Sub Cat Name',
            'sub_cat_desc' => 'Sub Cat Desc',
            'created_date' => 'Created Date',
            'added_by' => 'Added By',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'is_deleted' => 'Is Deleted',
            'deleted_date' => 'Deleted Date',
            'deleted_by' => 'Deleted By',
            'sub_cat_image' => 'Sub Cat Image',
            'order_id' => 'Order ID',
        ];
    }
}
