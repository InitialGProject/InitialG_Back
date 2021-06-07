<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductosFacturacion;

/**
 * ProductosfacturaSearch represents the model behind the search form of `app\models\ProductosFacturacion`.
 */
class ProductosfacturaSearch extends ProductosFacturacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_usuario', 'cp', 'enviado'], 'integer'],
            [['fecha_compra', 'direccion', 'pais', 'provincia', 'fecha_envio'], 'safe'],
            [['total'], 'number'],
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
        $query = ProductosFacturacion::find();

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
            'id_usuario' => $this->id_usuario,
            'fecha_compra' => $this->fecha_compra,
            'cp' => $this->cp,
            'enviado' => $this->enviado,
            'fecha_envio' => $this->fecha_envio,
            'total' => $this->total,
        ]);

        $query->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'pais', $this->pais])
            ->andFilterWhere(['like', 'provincia', $this->provincia]);

        return $dataProvider;
    }
}
