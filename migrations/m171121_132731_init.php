<?php

use yii\db\Migration;

/**
 * Class m171121_132731_init
 */
class m171121_132731_init extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%standarts}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(32)->notNull(),
            'value' => $this->text()->notNull(),
            'type' => $this->string(32)->notNull(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%standarts}}');
    }
}
