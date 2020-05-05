<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NoVida;

/**
 * NoVidaSearch represents the model behind the search form of `app\models\NoVida`.
 */
class NoVidaSearch extends NoVida
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'poliza'], 'integer'],
            [['tomador_dni', 'riesgo', 'tipo_poliza'], 'safe'],
            [['integrantes', 'capital_asegurado', 'prima'], 'number'],
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
        $query = NoVida::find();

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
            'poliza' => $this->poliza,
            'integrantes' => $this->integrantes,
            'capital_asegurado' => $this->capital_asegurado,
            'prima' => $this->prima,
        ]);

        $query->andFilterWhere(['ilike', 'tomador_dni', $this->tomador_dni])
            ->andFilterWhere(['ilike', 'riesgo', $this->riesgo])
            ->andFilterWhere(['ilike', 'tipo_poliza', $this->tipo_poliza]);

        return $dataProvider;
    }
}
