<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_seo_data".
 *
 * @property integer $id
 * @property string $page_title
 * @property string $meta_title
 * @property string $meta_description
 * @property string $url_name
 * @property string $page
 */
class SeoData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_seo_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_title', 'meta_title', 'meta_description'], 'required'],
            [['canonical_tag','seo_keywords'],'safe'],
            [['id'], 'integer'],
            [['page_title', 'url_name'], 'string', 'max' => 100],
            [['meta_title'], 'string', 'max' => 500],
            [['meta_description'], 'string', 'max' => 2000],
            [['page'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_title' => 'Page Title',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'url_name' => 'Url Name',
            'canonical_tag' => 'Canonical Tag',
            'seo_keywords' => 'Seo Keywords',
            'page' => 'Page',
        ];
    }
}
