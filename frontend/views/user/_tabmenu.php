<?php
use yii\helpers\Html;
use yii\helpers\Url;

$itemArr = [
    ['label' => 'Edit Profile', 'url' => ['user/profile']],
    ['label' => 'Change Password', 'url' => ['user/change-password']],
];
echo Html::ul($itemArr, ['item' => function ($item, $index) {
    $link = Html::a($item['label'], $item['url']);
    $activeLink = $this->context->route == $item['url'][0];
    if ($activeLink) {
        return "<li class='active'>{$link}</li>";
    } else {
        return "<li>{$link}</li>";
    }

},'class' => 'nav nav-justified nav-tabs']);

?>