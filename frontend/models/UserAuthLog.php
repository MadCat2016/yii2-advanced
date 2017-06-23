<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_auth_log".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $ip
 * @property string $user_agent
 * @property string $geo_target
 * @property integer $update_at
 * @property integer $created_at
 *
 * @property User $user
 */
class UserAuthLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_auth_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'update_at', 'created_at'], 'integer'],
            [['ip', 'user_agent', 'geo_target'], 'string', 'max' => 255],
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
            'ip' => 'Ip',
            'user_agent' => 'User Agent',
            'geo_target' => 'Geo Target',
            'update_at' => 'Update At',
            'created_at' => 'Created At',
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
