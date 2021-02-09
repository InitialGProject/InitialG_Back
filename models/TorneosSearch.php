<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Torneos;

/**
 * TorneosSearch represents the model behind the search form of `app\models\Torneos`.
 */
class TorneosSearch extends Torneos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'categorias_id', 'usuario_id', 'entrada_id'], 'integer'],
            [['titulo', 'imagen', 'descripcion', 'fechaInicio', 'fechaFin'], 'safe'],
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
        $query = Torneos::find();

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
            'categorias_id' => $this->categorias_id,
            'usuario_id' => $this->usuario_id,
            'fechaInicio' => $this->fechaInicio,
            'fechaFin' => $this->fechaFin,
            'entrada_id' => $this->entrada_id,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'imagen', $this->imagen])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
