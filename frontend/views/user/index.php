<?php
/**
 * Created by PhpStorm.
 * User: Jigar Kumar
 * Date: 1/1/2018
 * Time: 11:43 PM
 */

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#', 'class' => 'active'];
echo Yii::$app->session->get('username') . "______";