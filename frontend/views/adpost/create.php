<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Adpost */

$this->title = 'Create Adpost';
$this->params['breadcrumbs'][] = ['label' => 'Adposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="heading-panel">
    <h3 class="main-title text-left">
        Post Your Ad
    </h3>
</div>


<?= $this->render('_form', [
    'model' => $model,
]) ?>

