<?php

namespace frontend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;
use frontend\models\UserType;

/**
 * This is the model class for table "tbl_users".
 *
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_email
 * @property string $user_mobile
 * @property string $password
 * @property integer $user_status
 * @property integer $user_type
 * @property string $created_date
 * @property string $updated_date
 * @property integer $updated_by
 * @property string $user_desc
 */
class Users extends \yii\db\ActiveRecord  implements IdentityInterface
{

    const SUPER_ADMIN = 1;
    const BROKERS = 2;
    const USERS = 3;
    const APPROVER = 4;

    public $old_password;
    public $photo;
    public $check_list;
    public $to_enable;
    public $change_password;
    public $upload_file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_users_portal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_name', 'user_email', 'user_mobile', 'password', 'username', 'user_desc', 'user_type', 'added_by','password_raw', 'acceptance_str'], 'required'],
            [['user_status', 'user_type', 'updated_by', 'added_by'], 'integer'],
            [['created_date', 'updated_date','user_id','old_password',"user_image","photo","check_list", "to_enable", "change_password","upload_file"], 'safe'],
            [['user_name'], 'string', 'max' => 100],
            [['user_email', 'password', 'password_raw'], 'string', 'max' => 45],
            [['user_mobile'], 'string', 'max' => 20],
            [['acceptance_str'], 'string', 'max' => 500],
            [['user_desc'], 'string', 'max' => 2000],
            [['user_email'], 'unique'],
            [['user_email'], 'email'],
            [['user_mobile'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_name' => 'Full Name',
            'user_email' => 'User Email',
            'user_mobile' => 'User Mobile',
            'username' => 'Username',
            'password' => 'Password',
            'user_status' => 'User Status',
            'user_type' => 'User Type',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
            'updated_by' => 'Updated By',
            'user_image' => "Profile Image",
            'user_desc' => "Description",
            'acceptance_str' => 'Acceptance String'
        ];
    }

        /** INCLUDE USER LOGIN VALIDATION FUNCTIONS**/
        /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
/* modified */
    public static function findIdentityByAccessToken($token, $type = null)
    {
          return static::findOne(['access_token' => $token]);
    }
 
/* removed
    public static function findIdentityByAccessToken($token)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
*/
    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param  string      $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time()) {
            // token expired
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === sha1($password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Security::generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Security::generateRandomKey();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Security::generateRandomKey() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    /** EXTENSION MOVIE **/

}
