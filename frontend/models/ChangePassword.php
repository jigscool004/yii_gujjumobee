<?php
/**
 * Created by PhpStorm.
 * User: Jigar Kumar
 * Date: 1/6/2018
 * Time: 1:54 AM
 */

namespace frontend\models;

use yii;
use yii\base\Model;
use common\models\User;

class ChangePassword extends Model {
    public $password;
    public $new_password;
    public $confirm_password;



    public function rules() {
        return [
            [['password', 'new_password', 'confirm_password'],'required']
        ];
    }

    public function changePwd() {
        $model = User::findOne(Yii::$app->user->identity->getId());
        
        var_dump($model); exit;
    }
}