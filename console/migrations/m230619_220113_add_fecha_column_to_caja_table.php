<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%caja}}`.
 */
class m230619_220113_add_fecha_column_to_caja_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%caja}}', 'fecha', $this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%caja}}', 'fecha');
    }
}
