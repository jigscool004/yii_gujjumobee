<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property int $id
 * @property string $document_name
 * @property string $type
 * @property string $save_name store thumb image
 * @property int $adpost_id
 * @property string $created_on
 * @property int $created_by
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['document_name', 'type', 'save_name', 'adpost_id', 'created_on', 'created_by'], 'required'],
            [['adpost_id', 'created_by'], 'integer'],
            [['created_on'], 'safe'],
            [['document_name', 'save_name'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'document_name' => 'Document Name',
            'type' => 'Type',
            'save_name' => 'Save Name',
            'adpost_id' => 'Adpost ID',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
        ];
    }
}
