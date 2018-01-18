<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MobileCategory */

$this->title = 'Create Mobile Category';
$this->params['breadcrumbs'][] = ['label' => 'Mobile Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
