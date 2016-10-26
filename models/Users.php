<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 * @property string $confirmation_token
 * @property integer $confirmation_sent_at
 * @property integer $confirmed_at
 * @property string $unconfirmed_email
 * @property string $recovery_token
 * @property integer $recovery_sent_at
 * @property integer $blocked_at
 * @property integer $registered_from
 * @property integer $logged_in_from
 * @property integer $logged_in_at
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $registration_ip
 * @property string $role
 * @property integer $department_id
 * @property string $depname
 * @property string $name
 * @property string $avatar
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $avatar_img; 
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password_hash', 'auth_key', 'created_at', 'updated_at'], 'required'],
            [['confirmation_sent_at', 'confirmed_at', 'recovery_sent_at', 'blocked_at', 'registered_from', 'logged_in_from', 'logged_in_at', 'created_at', 'updated_at', 'department_id'], 'integer'],
            [['username'], 'string', 'max' => 25],
            [['email', 'unconfirmed_email', 'depname', 'name', 'avatar'], 'string', 'max' => 255],
            [['password_hash'], 'string', 'max' => 60],
            [['auth_key', 'confirmation_token', 'recovery_token'], 'string', 'max' => 32],
            [['registration_ip', 'role'], 'string', 'max' => 45],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['avatar_img'],'file','skipOnEmpty'=>'true','on'=>'update','extensions'=>'jpg,png']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'confirmation_token' => 'Confirmation Token',
            'confirmation_sent_at' => 'Confirmation Sent At',
            'confirmed_at' => 'Confirmed At',
            'unconfirmed_email' => 'Unconfirmed Email',
            'recovery_token' => 'Recovery Token',
            'recovery_sent_at' => 'Recovery Sent At',
            'blocked_at' => 'Blocked At',
            'registered_from' => 'Registered From',
            'logged_in_from' => 'Logged In From',
            'logged_in_at' => 'Logged In At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'registration_ip' => 'Registration Ip',
            'role' => 'Role',
            'department_id' => 'แผนก',
            'depname' => 'ชื่อแผนก',
            'name' => 'ชื่อ-สกุล',
            'avatar' => 'รูปประจำตัว',
        ];
    }
    public function getUserdep(){
        return $this->hasOne(Departments::className(), ['id'=>'department_id']);
    }
}
