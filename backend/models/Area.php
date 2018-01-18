<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property int $id
 * @property string $area
 * @property int $city_id
 * @property int $zipcode
 * @property int $status
 * @property string $created_on
 * @property int $created_by
 * @property string $updated_on
 * @property int $updated_by
 */
class Area extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'area';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['area','city_id','zipcode','status'],'required'],
            [['city_id', 'zipcode', 'status'], 'integer'],

            [['created_on', 'updated_on'], 'safe'],
            [['area'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'area' => 'Area name',
            'city_id' => 'City',
            'zipcode' => 'Zipcode',
            'status' => 'Status',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'updated_on' => 'Updated On',
            'updated_by' => 'Updated By',
        ];
    }

    public function getCityDetail() {
        return $this->hasOne(City::className(),['id' => 'city_id']);
    }
}
