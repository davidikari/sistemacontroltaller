<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $apellido
 * @property int|null $telefono
 * @property string|null $descripcion
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['telefono'], 'integer'],
            [['nombre', 'apellido'], 'string', 'max' => 20],
            [['descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'apellido' => Yii::t('app', 'Apellido'),
            'telefono' => Yii::t('app', 'Telefono'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
}
