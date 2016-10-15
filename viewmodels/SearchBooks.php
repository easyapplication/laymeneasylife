<?php

namespace app\viewmodels;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\viewmodels\Books;

/**
 * SearchBooks represents the model behind the search form about `app\viewmodels\Books`.
 */
class SearchBooks extends Books {

    /**
     * @inheritdoc
     */
    public function rules() {
        $rules = [
            [['id'], 'integer'],
        ];
        $counter = 2;
        $dynamicfields = $this->getFields();
        foreach ($dynamicfields as $field) {
            $rules[$counter] = [[$field->fieldname], 'string'];
            $counter++;
            $rules[$counter] = [[$field->fieldname], "safe"];
            $counter++;
        }
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Books::find();

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
        ]);
        $dynamicfields = $this->getFields();
        foreach ($dynamicfields as $field) {
            $query->andFilterWhere(['like', $field->fieldname, $this->{$field->fieldname}]);
        }
        return $dataProvider;
    }

}
