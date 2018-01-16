<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MobileCategory */

$this->title = 'Create Mobile Category';
$this->params['breadcrumbs'][] = ['label' => 'Mobile Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobile-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
