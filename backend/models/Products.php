<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_products".
 *
 * @property integer $id
 * @property string $prod_name
 * @property integer $cat_id
 * @property string $prod_desc
 * @property string $created_date
 * @property integer $added_by
 * @property integer $updated_by
 * @property string $updated_date
 * @property integer $is_deleted
 * @property string $deleted_date
 * @property integer $deleted_by
 * @property string $prod_barcode
 * @property string $prod_package
 * @property integer $order_id
 * @property string $prod_size
 * @property string $page_title
 * @property string $meta_title
 * @property string $meta_description
 * @property string $url_name
 */
class Products extends \yii\db\ActiveRecord
{

    public $main_image;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prod_name', 'search_name','cat_id', 'prod_desc', 'added_by', 'page_title', 'meta_title', 'meta_description', 'url_name','gst_rate','gst','prod_latest','prod_new'], 'safe'],
            [['cat_id', 'added_by', 'updated_by', 'is_deleted', 'deleted_by', 'order_id'], 'integer'],
            [['created_date', 'updated_date', 'deleted_date', 'main_image','prod_barcode'], 'safe'],
            [['prod_display_image'], 'file'],
            [['prod_name', 'prod_barcode', 'page_title', 'url_name'], 'string', 'max' => 100],
            [['prod_desc'], 'string', 'max' => 5000],
            [['prod_package', 'prod_size'], 'string', 'max' => 200],
            [['meta_title'], 'string', 'max' => 500],
            [['meta_description'], 'string', 'max' => 2000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prod_name' => 'Product Name',
            'cat_id' => 'Select Category',
            'prod_desc' => 'Product Description',
            'created_date' => 'Created Date',
            'prod_display_image' => 'Product Display Image',
            'main_image' => 'Products Multiple Images',
            'added_by' => 'Added By',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'is_deleted' => 'Is Deleted',
            'deleted_date' => 'Deleted Date',
            'deleted_by' => 'Deleted By',
            'prod_barcode' => 'Product Barcode',
            'prod_package' => 'Product Package',
            'order_id' => 'Order ID',
            'prod_size' => 'Product Size',
            'page_title' => 'Page Title',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'url_name' => 'Url Name',
        ];
    }
}
