<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hogares;

/**
 * HogaresSearch represents the model behind the search form of `app\models\Hogares`.
 */
class HogaresSearch extends Hogares
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'poliza'], 'integer'],
            [['tomador_dni', 'direccion', 'poblacion', 'provincia'], 'safe'],
            [['cp', 'viviendas', 'metros_cuadrados', 'capital_asegurado', 'prima'], 'number'],
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
        $query = Hogares::find();

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
            'cp' => $this->cp,
            'viviendas' => $this->viviendas,
            'metros_cuadrados' => $this->metros_cuadrados,
            'capital_asegurado' => $this->capital_asegurado,
            'prima' => $this->prima,
        ]);

        $query->andFilterWhere(['ilike', 'tomador_dni', $this->tomador_dni])
            ->andFilterWhere(['ilike', 'direccion', $this->direccion])
            ->andFilterWhere(['ilike', 'poblacion', $this->poblacion])
            ->andFilterWhere(['ilike', 'provincia', $this->provincia]);

        return $dataProvider;
    }
}
