<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Adpost */

$this->title = 'Create Adpost';
$this->params['breadcrumbs'][] = ['label' => 'Adposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adpost-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
