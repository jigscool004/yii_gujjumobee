<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\City */

$this->title = 'Update City: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="content-header">
    <h1>
        <?= Html::encode($this->title) ?>
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</section>
