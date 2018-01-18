<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\City;
/* @var $this yii\web\View */
/* @var $model backend\models\Area */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">

    <div class="box box-info">
        <div class="box-body">
            <div class="col-md-8">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_id')->dropDownList(
            ArrayHelper::map(City::find()->where(['status' => 1])->All(),'id','name'),
            ['prompt' => 'Select City']
    ) ?>

    <?= $form->field($model, 'zipcode')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([1 => 'Active', 0 => 'Inactive'],['prompt' => 'Select']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
