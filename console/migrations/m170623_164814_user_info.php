<?php

use yii\db\Migration;

class m170623_164814_user_info extends Migration
{
    public function safeUp()
    {
        {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            }

            $this->createTable('{{%user_info}}', [
                'id' => $this->primaryKey(),
                'user_id' => $this->integer()->notNull(),
                'string: first_name;' => $this->string(),
                'string: last_name;' => $this->string(),
                'birthday' => $this->date()->notNull(),
                'gender' => $this->integer()->notNull(),
            ], $tableOptions);

            $this->addForeignKey('user_info', 'user_info', 'user_id',
                'user', 'id');
        }
    }

    public function safeDown()
    {
        $this->dropForeignKey('user_info', 'user_info');
        $this->dropTable('user_info');
    }
}
