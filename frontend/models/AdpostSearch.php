<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Adpost;

/**
 * AdpostSearch represents the model behind the search form of `frontend\models\Adpost`.
 */
class AdpostSearch extends Adpost {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'adpost_user_id', 'category', 'price', 'city', 'location', 'zipcode', 'status', 'is_archived', 'is_deleted'], 'integer'],
            [['adpost_id', 'adtitle', 'model', 'ad_desc', 'ad_tag', 'adpost_username', 'adpost_user_mobile', 'created_on', 'updated_on'], 'safe'],
        ];
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
        $query = Adpost::find();

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
            'adpost_user_id' => $this->adpost_user_id,
            'category' => $this->category,
            'price' => $this->price,
            'city' => $this->city,
            'location' => $this->location,
            'zipcode' => $this->zipcode,
            'created_on' => $this->created_on,
            'status' => $this->status,
            'is_archived' => $this->is_archived,
            'is_deleted' => $this->is_deleted,
            'updated_on' => $this->updated_on,
        ]);

        $query->andFilterWhere(['like', 'adpost_id', $this->adpost_id])
            ->andFilterWhere(['like', 'adtitle', $this->adtitle])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'ad_desc', $this->ad_desc])
            ->andFilterWhere(['like', 'ad_tag', $this->ad_tag])
            ->andFilterWhere(['like', 'adpost_username', $this->adpost_username])
            ->andFilterWhere(['like', 'adpost_user_mobile', $this->adpost_user_mobile]);

        return $dataProvider;
    }
}
