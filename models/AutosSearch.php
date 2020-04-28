<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Autos;

/**
 * AutosSearch represents the model behind the search form of `app\models\Autos`.
 */
class AutosSearch extends Autos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'poliza'], 'integer'],
            [['tomador_dni', 'tipo_auto', 'marca', 'modelo', 'matricula', 'tipo_poliza'], 'safe'],
            [['caballos', 'capital_asegurado', 'prima'], 'number'],
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
        $query = Autos::find();

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
            'caballos' => $this->caballos,
            'capital_asegurado' => $this->capital_asegurado,
            'prima' => $this->prima,
        ]);

        $query->andFilterWhere(['ilike', 'tomador_dni', $this->tomador_dni])
            ->andFilterWhere(['ilike', 'tipo_auto', $this->tipo_auto])
            ->andFilterWhere(['ilike', 'marca', $this->marca])
            ->andFilterWhere(['ilike', 'modelo', $this->modelo])
            ->andFilterWhere(['ilike', 'matricula', $this->matricula])
            ->andFilterWhere(['ilike', 'tipo_poliza', $this->tipo_poliza]);

        return $dataProvider;
    }
}
