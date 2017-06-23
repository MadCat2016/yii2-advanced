<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $email
 * @property string $password_hash
 * @property integer $status
 * @property integer $created_at
 *
 * @property UserAuthLog[] $userAuthLogs
 * @property UserInfo[] $userInfos
 * @property UserPreference[] $userPreferences
 * @property UserSocialNetwork[] $userSocialNetworks
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['email', 'password_hash', 'created_at'], 'required'],
            [['status', 'created_at'], 'integer'],
            [['email', 'password_hash'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAuthLogs()
    {
        return $this->hasMany(UserAuthLog::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserInfos()
    {
        return $this->hasMany(UserInfo::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPreferences()
    {
        return $this->hasMany(UserPreference::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSocialNetworks()
    {
        return $this->hasMany(UserSocialNetwork::className(), ['user_id' => 'id']);
    }
}
