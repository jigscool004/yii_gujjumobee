<?php
/**
 * Created by PhpStorm.
 * User: Jigar Kumar
 * Date: 1/1/2018
 * Time: 11:58 PM
 */

namespace common\components;
use Yii;
use yii\web\User;
class Users extends  User {
    public function afterLogin($identity, $cookieBased, $duration) {
        Yii::$app->session->set('username',$identity->username);
        Yii::$app->session->set('contact_number',$identity->contact_number);
        Yii::$app->session->set('email',$identity->email);
        Yii::$app->session->set('photo',$identity->photo);
        Yii::$app->session->set('name',$identity->name);
        parent::afterLogin($identity, $cookieBased, $duration); // TODO: Change the autogenerated stub
    }
}