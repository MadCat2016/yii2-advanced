<?php

use yii\db\Migration;

class m170623_203719_create_user_preference extends Migration
{
    public function safeUp()
    {
        {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            }

            $this->createTable('{{%user_preference}}', [
                'id' => $this->primaryKey(),
                'user_id' => $this->integer()->notNull(),
                'type_id' => $this->integer()->notNull(),

            ], $tableOptions);

            $this->addForeignKey('user_preference', 'user_preference', 'user_id',
                'user', 'id');
        }
    }

    public function safeDown()
    {
        $this->dropForeignKey('user_preference', 'user_preference');
        $this->dropTable('user_preference');
    }
}