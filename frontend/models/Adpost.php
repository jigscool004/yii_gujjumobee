<?php

namespace frontend\models;

use Yii;
use yii\helpers\FileHelper;
use frontend\models\Document;
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
    public $fileName;

    public static function tableName() {
        return 'adpost';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'adpost_user_id', 'category', 'price', 'city', 'location', 'zipcode', 'status', 'is_archived', 'is_deleted'], 'integer'],
            [[ 'adtitle', 'adpost_user_id', 'category', 'price', 'ad_desc',
                'adpost_username', 'adpost_user_mobile', 'city', 'location', 'zipcode', 'created_on'], 'required'],
            [['ad_desc'], 'string'],
            [['created_on', 'updated_on', 'fileName'], 'safe'],
            [['adpost_id'], 'string', 'max' => 11],
            ['fileName', 'file', 'extensions' => 'jpg,gif,png', 'maxSize' => 20 * 1024 * 1024, 'maxFiles' => 0],
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

    public function upload($model) {
        $filePath = Yii::$app->basePath . '/web/uploads/adpost_photos/' . $model->adpost_id;
        FileHelper::createDirectory($filePath, $mode = 0775, $recursive = true);
        foreach ($this->fileName as $file) {

            $file->saveAs($filePath . "/" . $file->baseName . '.' . $file->extension);

            $document = new Document();
            $document->document_name = $file->name;
            $document->save_name = $file->name;
            $document->type = 'adpost';
            $document->adpost_id = $model->id;
            $document->created_on = date('Y-m-d H:i:s');
            $document->created_by = Yii::$app->user->getId();
            $document->save(false);

        }
        return TRUE;
    }
}
