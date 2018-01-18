<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Area */

$this->title = 'Create Area';
$this->params['breadcrumbs'][] = ['label' => 'Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>


