<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\AdpostMessage;

/**
 * AdpostMessageSearch represents the model behind the search form of `frontend\models\AdpostMessage`.
 */
class AdpostMessageSearch extends AdpostMessage
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'adpost_id', 'user_id', 'is_sent', 'is_deleted', 'is_archived'], 'integer'],
            [['message', 'created_on'], 'safe'],
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
        $query = AdpostMessage::find();

        // add conditions that should always apply here
        $query->select('*,COUNT(id) AS totalMsg');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $dataProvider->setSort([
            'attributes' => [
                'message' => [
                    'asc' => ['message' => SORT_ASC],
                    'desc' => ['message' => SORT_DESC],
                    'default' => SORT_ASC
                ],
                'created_on' => [
                    'asc' => ['created_on' => SORT_ASC],
                    'desc' => ['created_on' => SORT_DESC],
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->groupBy('adpost_id,user_id');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'adpost_id' => $this->adpost_id,
            'user_id' => $this->user_id,
            'is_sent' => $this->is_sent,
            'is_deleted' => $this->is_deleted,
            'is_archived' => $this->is_archived,
            'created_on' => $this->created_on,
        ]);

        $query->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}
