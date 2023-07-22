<?php

use yii\db\Migration;

/**
 * Class m230722_195636_change_phone_column_to_varchar
 */
class m230722_195636_change_phone_column_to_varchar extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
                $this->alterColumn('cliente', 'telefono', $this->string(20));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230722_195636_change_phone_column_to_varchar cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230722_195636_change_phone_column_to_varchar cannot be reverted.\n";

        return false;
    }
    */
}
