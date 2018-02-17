<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ad_wishlist".
 *
 * @property int $id
 * @property int $adpost_id
 * @property int $ad_user_id
 * @property int $is_deleted
 * @property string $created_on
 */
class AdWishlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ad_wishlist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'adpost_id', 'ad_user_id', 'created_on'], 'required'],
            [['id', 'adpost_id', 'ad_user_id', 'is_deleted'], 'integer'],
            [['created_on'], 'safe'],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'adpost_id' => 'Adpost ID',
            'ad_user_id' => 'Ad User ID',
            'is_deleted' => 'Is Deleted',
            'created_on' => 'Created On',
        ];
    }
}
