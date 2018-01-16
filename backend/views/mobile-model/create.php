<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MobileModel */

$this->title = 'Create Mobile Model';
$this->params['breadcrumbs'][] = ['label' => 'Mobile Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobile-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
