<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\References;

/**
 * ReferencesSearch represents the model behind the search form about `app\models\References`.
 */
class ReferencesSearch extends References
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'professorID', 'studentID'], 'integer'],
            [['title', 'author', 'type', 'URL', 'date_created_by_author', 'date_created_by_student', 'date_updated_by_student', 'file'], 'safe'],
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
        $query = References::find();

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
            'studentID' => $this->studentID,
            'date_created_by_author' => $this->date_created_by_author,
            'date_created_by_student' => $this->date_created_by_student,
            'date_updated_by_student' => $this->date_updated_by_student,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'URL', $this->URL])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
