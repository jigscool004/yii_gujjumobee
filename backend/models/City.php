<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property int $name
 * @property int $status
 * @property int $created_by
 * @property string $created_on
 * @property int $update_by
 * @property string $updated_on
 */
class City extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name','status'],'required'],
            [[ 'status', 'created_by', 'update_by'], 'integer'],
            [['created_on', 'updated_on'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_on' => 'Created On',
            'update_by' => 'Update By',
            'updated_on' => 'Updated On',
        ];
    }
}
