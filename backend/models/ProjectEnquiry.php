<?php

namespace backend\models;

use Yii;



class ProjectEnquiry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_enquiry';
    }

    public function rules()
    {
        return [
            
            [['pro_id', 'fullname', 'email', 'phone', 'info','from_place'], 'required'],

        	 ];
    }


     public function attributeLabels()
    {
        return [
            'pro_id' => 'Project ID',
            'fullname' => 'Fullname',
            'email' => 'Email',
            'from_place' => 'Where are you from',
            'phone' => 'Phone Number',
            'info' => 'Information',
            ];
    }
}