<?php

namespace app\coreviewmodels;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\viewmodels\Models;

/**
 * SearchModels represents the model behind the search form about `app\viewmodels\Models`.
 */
class SearchModels extends Models
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'activestatus', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['model'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Models::find();

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
            'activestatus' => $this->activestatus,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'model', $this->model]);

        return $dataProvider;
    }
}
