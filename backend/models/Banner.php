<?php

namespace backend\models;

use Yii;



class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_banner';
    }

    public function rules()
    {
        return [
        
            [['banner_title', 'banner_desc', 'banner_image','banner_small_img','banner_cat_name' ], 'safe'],
            [['banner_url','banner_url_status'], 'safe'],

             ];
    }


     public function attributeLabels()
    {
        return [
            
            'banner_title' => 'Banner Title',
            'banner_desc' => 'Banner Description',
            'banner_image' => 'Banner Image',
            'banner_small_img' => 'Banner Small Image',
            'banner_cat_name' => 'Category Name',
            'banner_url' => 'Banner URL',
            'banner_url_status' => 'These Banner Has Link' ,
            ];
    }
}