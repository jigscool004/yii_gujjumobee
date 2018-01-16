<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MobileCategory */

$this->title = 'Update Mobile Category: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Mobile Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mobile-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
