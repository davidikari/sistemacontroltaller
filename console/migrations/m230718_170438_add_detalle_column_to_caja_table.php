<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%caja}}`.
 */
class m230718_170438_add_detalle_column_to_caja_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%caja}}', 'detalle', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%caja}}', 'detalle');
    }
}
