<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\MobileCategory;
use backend\models\MobileModel;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\Adpost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adpost-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <?= $form->field($model, 'adtitle')->textInput(['maxlength' => TRUE]) ?>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            <?= $form->field($model, 'category')->dropDownList(
                ArrayHelper::map(MobileCategory::find()->where(['status' => 1])->All(),'id','name'),
                ['prompt' => 'Select Category']
            ); ?>
        </div>
        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            <?= $form->field($model, 'model')->dropDownList(
                ArrayHelper::map(MobileModel::find()->where(['status' => 1])->All(),'id','name'),
                ['prompt' => 'Select Category']
            ); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <?= $form->field($model, 'price')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <?= $form->field($model, 'ad_desc')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <?= $form->field($model, 'ad_tag')->textInput(['maxlength' => TRUE]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            <?= $form->field($model, 'adpost_username')->textInput(['maxlength' => TRUE]) ?>
        </div>
        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            <?= $form->field($model, 'adpost_user_mobile')->textInput(['maxlength' => TRUE]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            <?= $form->field($model, 'city')->textInput() ?>
        </div>
        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            <?= $form->field($model, 'location')->textInput() ?>
        </div>
    </div>





    <?= $form->field($model, 'zipcode')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
