<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_inquiries".
 *
 * @property integer $id
 * @property string $full_name
 * @property string $email
 * @property string $mobile
 * @property string $additional_instructions
 * @property string $created_date
 * @property integer $added_by
 * @property integer $updated_by
 * @property string $updated_date
 * @property integer $is_deleted
 * @property string $deleted_date
 * @property integer $deleted_by
 */
class Inquiries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_inquiries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_name', 'email', 'mobile'], 'required'],
            [['mobile'], 'number'],
            [['created_date', 'updated_date', 'deleted_date'], 'safe'],
            [['added_by', 'updated_by', 'is_deleted', 'deleted_by'], 'integer'],
            [['full_name', 'email'], 'string', 'max' => 100],
            [['additional_instructions'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'email' => 'Email',
            'mobile' => 'Mobile',
            'additional_instructions' => 'Message',
            'created_date' => 'Created Date',
            'added_by' => 'Added By',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'is_deleted' => 'Is Deleted',
            'deleted_date' => 'Deleted Date',
            'deleted_by' => 'Deleted By',
        ];
    }
}
