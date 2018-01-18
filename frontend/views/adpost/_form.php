<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Adpost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adpost-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'adpost_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adpost_user_id')->textInput() ?>

    <?= $form->field($model, 'category')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ad_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ad_tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adpost_username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adpost_user_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput() ?>

    <?= $form->field($model, 'location')->textInput() ?>

    <?= $form->field($model, 'zipcode')->textInput() ?>

    <?= $form->field($model, 'created_on')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'is_archived')->textInput() ?>

    <?= $form->field($model, 'is_deleted')->textInput() ?>

    <?= $form->field($model, 'updated_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
