<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%caja}}`.
 */
class m230619_215353_create_caja_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%caja}}', [
            'id' => $this->primaryKey(),
            'monto' => $this->integer()->notNull(),
            'tipo' => $this->integer(),
            'id_categoria' => $this->integer(),
            'id_cliente' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%caja}}');
    }
}
