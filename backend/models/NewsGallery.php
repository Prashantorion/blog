<?php

namespace backend\models;

use Yii;



class NewsGallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_news_gallery';
    }

    public function rules()
    {
        return [
            
            [['id','news_id','news_gallery_title','news_gallery_status'], 'safe'],
            [[ 'news_gallery'], 'file'],

        	 ];
    }


     public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'news_id' => 'Select Blog ID',
            'news_gallery' => 'Blog Gallery Image',
            'news_gallery_title' => 'Blog Gallery Title',
            'news_gallery_status' => 'Blog Gallery'
            ];
    }
}