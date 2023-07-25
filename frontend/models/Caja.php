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
            [['detalle'], 'string', 'max' => 255],
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
            'detalle' => Yii::t('app', 'Detalle'),
        ];
    }

    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'id_categoria']);
    }

    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'id_cliente']);
    }
}

