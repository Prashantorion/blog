<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_categories".
 *
 * @property integer $id
 * @property string $cat_name
 * @property string $cat_desc
 * @property string $created_date
 * @property integer $added_by
 * @property integer $updated_by
 * @property string $updated_date
 * @property integer $is_deleted
 * @property string $deleted_date
 * @property integer $deleted_by
 * @property string $cat_image
 * @property integer $order_id
 * @property string $page_title
 * @property string $meta_title
 * @property string $meta_description
 * @property string $url_name
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_date', 'updated_date', 'deleted_date'], 'safe'],
            [['added_by', 'cat_image', 'page_title', 'meta_title', 'meta_description', 'url_name'], 'required'],
            [['added_by', 'updated_by', 'is_deleted', 'deleted_by', 'order_id'], 'integer'],
            [['cat_name', 'page_title', 'url_name'], 'string', 'max' => 100],
            [['cat_desc', 'meta_description'], 'string', 'max' => 2000],
            [['cat_image','cat_icon'], 'file'],
            [['meta_title'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' =>'Type ID',
            'cat_name' => 'Category Name',
            'cat_desc' => 'Category Description',
            'created_date' => 'Created Date',
            'added_by' => 'Added By',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'is_deleted' => 'Is Deleted',
            'deleted_date' => 'Deleted Date',
            'deleted_by' => 'Deleted By',
            'cat_image' => 'Category Image',
            'cat_icon' => 'Category Icon',
            'order_id' => 'Order ID',
            'page_title' => 'Page Title',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'url_name' => 'Url Name',
        ];
    }
}
