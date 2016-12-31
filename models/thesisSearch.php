<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\thesis;

/**
 * thesisSearch represents the model behind the search form about `app\models\thesis`.
 */
class thesisSearch extends thesis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'professorID', 'max_students', 'committee1', 'committee2', 'committee3'], 'integer'],
            [['title', 'description', 'goal', 'prerequisite_knowledge', 'comments', 'status', 'dateCreated', 'datePresented', 'RequestPDf', 'masterID'], 'safe'],
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
        $query = thesis::find();

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
            'ID' => $this->ID,
            'professorID' => $this->professorID,
            'max_students' => $this->max_students,
            'dateCreated' => $this->dateCreated,
            'datePresented' => $this->datePresented,
            'committee1' => $this->committee1,
            'committee2' => $this->committee2,
            'committee3' => $this->committee3,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'goal', $this->goal])
            ->andFilterWhere(['like', 'prerequisite_knowledge', $this->prerequisite_knowledge])
            ->andFilterWhere(['like', 'comments', $this->comments])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'RequestPDf', $this->RequestPDf])
            ->andFilterWhere(['like', 'masterID', $this->masterID]);

        return $dataProvider;
    }
}
