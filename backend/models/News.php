<?php

namespace backend\models;

use Yii;



class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_news';
    }

    public function rules()
    {
        return [
            
            [['news_title', 'news_image', 'news_desc', 'news_video','news_video_status', 'news_date','blog_status' ], 'safe'],

        	 ];
    }


     public function attributeLabels()
    {
        return [
            'news_title' => 'Title',
            'news_desc' => 'Description',
            'news_image' => 'Blog Image',
            'news_video' => 'Youtube Video Link (Url Format - https://www.youtube.com/embed/videoID?rel=0&amp;showinfo=0)',
            'news_video_status' => 'News Video',
            'news_date' => 'News Date',
            'blog_status' => 'Blog Status',
            ];
    }
}