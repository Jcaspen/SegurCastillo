<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Siniestros;

/**
 * SiniestrosSearch represents the model behind the search form of `app\models\Siniestros`.
 */
class SiniestrosSearch extends Siniestros
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'siniestro'], 'integer'],
            [['tomador_dni', 'tipo_poliza', 'observaciones'], 'safe'],
            [['capital_desenbolsado'], 'number'],
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
        $query = Siniestros::find();

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
            'siniestro' => $this->siniestro,
            'capital_desenbolsado' => $this->capital_desenbolsado,
        ]);

        $query->andFilterWhere(['ilike', 'tomador_dni', $this->tomador_dni])
            ->andFilterWhere(['ilike', 'tipo_poliza', $this->tipo_poliza])
            ->andFilterWhere(['ilike', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
