<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mobile_model".
 *
 * @property int    $id
 * @property int    $category_id
 * @property string $name
 * @property int    $status
 * @property int    $created_by
 * @property string $created_on
 * @property string $updated_on
 * @property int    $update_by
 */
class MobileModel extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'mobile_model';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['category_id','status','name'],'required'],
            [['category_id', 'status', 'created_by', 'update_by'], 'integer'],
            [['created_on', 'updated_on'], 'safe'],
            [['name'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'category_id' => 'Category',
            'name' => 'Name',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
            'update_by' => 'Update By',
        ];
    }

    public function getMobileCategory() {
        return $this->hasOne(MobileCategory::className(),['id' => 'category_id']);
    }
}
