<?php

use yii\db\Migration;

class m170623_162547_user_social_network extends Migration
{
    public function safeUp()
    {
        {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            }

            $this->createTable('{{%user_social_network}}', [
                'id' => $this->primaryKey(),
                'user_id' => $this->integer()->notNull(),
                'social_network_id' => $this->integer()->notNull(),
                'user_token' => $this->string()->notNull(),
            ], $tableOptions);

            $this->addForeignKey('social_networks', 'user_social_network', 'user_id',
                'user', 'id');
        }
    }

    public function safeDown()
    {
        $this->dropForeignKey('social_networks', 'user_social_network');
        $this->dropTable('user_social_network');
    }
}
