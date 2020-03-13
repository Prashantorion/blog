<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_user_registrations".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $city
 * @property string $created_date
 * @property integer $added_by
 * @property integer $updated_by
 * @property string $updated_date
 * @property integer $is_deleted
 * @property string $deleted_date
 * @property integer $deleted_by
 */
class UserRegistrations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_user_registrations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'city', 'added_by'], 'required'],
            [['created_date', 'updated_date', 'deleted_date'], 'safe'],
            [['added_by', 'updated_by', 'is_deleted', 'deleted_by'], 'integer'],
            [['name', 'email'], 'string', 'max' => 100],
            [['phone', 'city'], 'string', 'max' => 45],
            [['email'], 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'city' => 'City',
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
