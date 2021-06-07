<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductosFactura;

/**
 * ProductoslineaSearch represents the model behind the search form of `app\models\ProductosFactura`.
 */
class ProductoslineaSearch extends ProductosFactura
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_facturacion', 'id_producto', 'cantidad'], 'integer'],
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
        $query = ProductosFactura::find();

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
            'id_facturacion' => $this->id_facturacion,
            'id_producto' => $this->id_producto,
            'cantidad' => $this->cantidad,
        ]);

        return $dataProvider;
    }
}
