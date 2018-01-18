<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AdpostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adpost-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'adpost_id') ?>

    <?= $form->field($model, 'adtitle') ?>

    <?= $form->field($model, 'adpost_user_id') ?>

    <?= $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'ad_desc') ?>

    <?php // echo $form->field($model, 'ad_tag') ?>

    <?php // echo $form->field($model, 'adpost_username') ?>

    <?php // echo $form->field($model, 'adpost_user_mobile') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'zipcode') ?>

    <?php // echo $form->field($model, 'created_on') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'is_archived') ?>

    <?php // echo $form->field($model, 'is_deleted') ?>

    <?php // echo $form->field($model, 'updated_on') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
