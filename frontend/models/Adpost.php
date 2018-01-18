<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "adpost".
 *
 * @property int    $id
 * @property string $adpost_id generate unqiue adpost id
 * @property string $adtitle
 * @property int    $adpost_user_id
 * @property int    $category
 * @property int    $price
 * @property string $model
 * @property string $ad_desc
 * @property string $ad_tag
 * @property string $adpost_username
 * @property string $adpost_user_mobile
 * @property int    $city
 * @property int    $location
 * @property int    $zipcode
 * @property string $created_on
 * @property int    $status    1 = unsold, 0 = sole
 * @property int    $is_archived
 * @property int    $is_deleted
 * @property string $updated_on
 */
class Adpost extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'adpost';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'adpost_user_id', 'category', 'price', 'city', 'location', 'zipcode', 'status', 'is_archived', 'is_deleted'], 'integer'],
            [['adpost_id', 'adtitle', 'adpost_user_id', 'category', 'price', 'ad_desc', 'ad_tag', 'adpost_username', 'adpost_user_mobile', 'city', 'location', 'zipcode', 'created_on'], 'required'],
            [['ad_desc'], 'string'],
            [['created_on', 'updated_on'], 'safe'],
            [['adpost_id'], 'string', 'max' => 11],
            [['adtitle', 'ad_tag', 'adpost_username'], 'string', 'max' => 255],
            [['model'], 'string', 'max' => 30],
            [['adpost_user_mobile'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'adpost_id' => 'Adpost ID',
            'adtitle' => 'Adtitle',
            'adpost_user_id' => 'Adpost User ID',
            'category' => 'Category',
            'price' => 'Price',
            'model' => 'Model',
            'ad_desc' => 'Ad Desc',
            'ad_tag' => 'Ad Tag',
            'adpost_username' => 'Adpost Username',
            'adpost_user_mobile' => 'Adpost User Mobile',
            'city' => 'City',
            'location' => 'Location',
            'zipcode' => 'Zipcode',
            'created_on' => 'Created On',
            'status' => 'Status',
            'is_archived' => 'Is Archived',
            'is_deleted' => 'Is Deleted',
            'updated_on' => 'Updated On',
        ];
    }
}
