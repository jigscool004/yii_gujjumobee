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
            [['password', 'new_password', 'confirm_password'],'required'],
            ['password','validatePassword'],
            ['confirm_password','compare','compareAttribute' => 'new_password', 'message'=>"Passwords don't match" ],

        ];
    }

    public function validatePassword($attribute, $params, $validator) {
        $user = new User;
        $user->password_hash = Yii::$app->user->identity->password_hash;
        $isValidate = $user->validatePassword($this->password,Yii::$app->user->identity->password_hash);
        if ($isValidate == false) {
            $this->addError($attribute,'Current password is not matched');
        } else {
            $user->password_hash = $user->password_hash;
        }
    }

    public function changePwd() {
        $model = User::findOne(Yii::$app->user->getId());
        $model->setPassword($this->new_password);
        return $model->save();
    }
}