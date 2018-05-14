<?php

use yii\db\Migration;

/**
 * Class m180514_071157_fix_key.
 */
class m180514_071157_fix_key extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('standarts', 'key', 'varchar(255) NOT NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return false;
    }
}
