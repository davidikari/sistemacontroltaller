<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Caja;

/**
 * CajaSearch represents the model behind the search form of `frontend\models\Caja`.
 */
class CajaSearch extends Caja
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'monto', 'tipo', 'id_categoria', 'id_cliente'], 'integer'],
            [['fecha'], 'safe'],
            [['detalle'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Caja::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'monto' => $this->monto,
            'tipo' => $this->tipo,
            'id_categoria' => $this->id_categoria,
            'id_cliente' => $this->id_cliente,
            'fecha' => $this->fecha,
            'detalle' => $this->detalle,
        ]);

        return $dataProvider;
    }
}
