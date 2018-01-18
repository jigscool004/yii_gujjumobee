<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MobileModel */

$this->title = 'Create Mobile Model';
$this->params['breadcrumbs'][] = ['label' => 'Mobile Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

