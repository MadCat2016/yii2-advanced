<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_social_network".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $social_network_id
 * @property string $user_token
 *
 * @property User $user
 */
class UserSocialNetwork extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_social_network';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'social_network_id', 'user_token'], 'required'],
            [['user_id', 'social_network_id'], 'integer'],
            [['user_token'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'social_network_id' => 'Social Network ID',
            'user_token' => 'User Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
