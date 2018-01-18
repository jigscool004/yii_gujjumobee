<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MobileModel;

/**
 * MobileModelSearch represents the model behind the search form of `backend\models\MobileModel`.
 */
class MobileModelSearch extends MobileModel {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'status', 'created_by', 'update_by'], 'integer'],
            [['name', 'category_id', 'created_on', 'updated_on'], 'safe'],
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
        $query = MobileModel::find();

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

        $query->joinWith('mobileCategory');
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'mobile_model.status' => $this->status,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on,
            'updated_on' => $this->updated_on,
            'update_by' => $this->update_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'mobile_category.name', $this->category_id]);

        return $dataProvider;
    }
}
