<?php

namespace app\viewmodels;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\viewmodels\Formfields;

/**
 * SearchFormfields represents the model behind the search form about `app\viewmodels\Formfields`.
 */
class SearchFormfields extends Formfields
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'required', 'position', 'visible', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['fieldname', 'title', 'fieldtype', 'expression', 'field_size', 'field_size_min', 'error_message', 'model', 'label'], 'safe'],
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
        $query = Formfields::find();

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
            'required' => $this->required,
            'position' => $this->position,
            'visible' => $this->visible,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'fieldname', $this->fieldname])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'fieldtype', $this->fieldtype])
            ->andFilterWhere(['like', 'expression', $this->expression])
            ->andFilterWhere(['like', 'field_size', $this->field_size])
            ->andFilterWhere(['like', 'field_size_min', $this->field_size_min])
            ->andFilterWhere(['like', 'error_message', $this->error_message])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'label', $this->label]);

        return $dataProvider;
    }
}
