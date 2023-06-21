<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "caja".
 *
 * @property int $id
 * @property int $monto
 * @property int|null $tipo
 * @property int|null $id_categoria
 * @property int|null $id_cliente
 * @property string|null $fecha
 */
class Caja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'caja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['monto'], 'required'],
            [['monto', 'tipo', 'id_categoria', 'id_cliente'], 'integer'],
            [['fecha'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'monto' => Yii::t('app', 'Monto'),
            'tipo' => Yii::t('app', 'Tipo'),
            'id_categoria' => Yii::t('app', 'Id Categoria'),
            'id_cliente' => Yii::t('app', 'Id Cliente'),
            'fecha' => Yii::t('app', 'Fecha'),
        ];
    }
}
