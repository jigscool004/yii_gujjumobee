<?php

namespace frontend\models;

use Yii;
use common\models\User;
use frontend\models\Adpost;

/**
 * This is the model class for table "adpost_message".
 *
 * @property int $id
 * @property int $adpost_id
 * @property int $user_id
 * @property string $message
 * @property int $is_sent
 * @property int $is_deleted
 * @property int $is_archived
 * @property string $created_on
 */
class AdpostMessage extends \yii\db\ActiveRecord
{
    public $totalMsg;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adpost_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['adpost_id', 'user_id', 'message', 'created_on'], 'required'],
            [['adpost_id', 'user_id', 'is_sent', 'is_deleted', 'is_archived'], 'integer'],
            [['message'], 'string'],
            [['created_on'], 'safe'],
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
            'user_id' => 'User ID',
            'message' => 'Message',
            'is_sent' => 'Is Sent',
            'is_deleted' => 'Is Deleted',
            'is_archived' => 'Is Archived',
            'created_on' => 'Created On',
        ];
    }

    public function getAdpostUser() {
        return $this->hasOne(User::className(),['id' => 'user_id']);
    }

    public function getAdpost() {
        return $this->hasOne(Adpost::className(),['id' => 'adpost_id']);
    }
}
