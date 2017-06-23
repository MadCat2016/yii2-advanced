<?php

use yii\db\Migration;

class m170623_204255_create_user_auth_log extends Migration
{
    public function safeUp()
    {
        {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            }

            $this->createTable('{{%user_auth_log}}', [
                'id' => $this->primaryKey(),
                'user_id' => $this->integer()->notNull(),
                'ip' => $this->string(),
                'user_agent' => $this->string(),
                'geo_target' => $this->string(),
                'update_at' => $this->integer(),
                'created_at' => $this->integer(),
            ], $tableOptions);

            $this->addForeignKey('user_auth_log', 'user_auth_log', 'user_id',
                'user', 'id');
        }
    }

    public function safeDown()
    {
        $this->dropForeignKey('user_auth_log', 'user_auth_log');
        $this->dropTable('user_auth_log');
    }
}