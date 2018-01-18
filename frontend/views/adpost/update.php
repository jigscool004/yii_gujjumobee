<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Adpost */

$this->title = 'Update Adpost: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Adposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="adpost-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
