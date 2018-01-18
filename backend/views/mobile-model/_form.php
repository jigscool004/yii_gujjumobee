<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\MobileCategory;

/* @var $this yii\web\View */
/* @var $model backend\models\MobileModel */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">

    <div class="box box-info">
        <div class="box-body">
            <div class="col-md-8">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'category_id')->dropDownList(
                    ArrayHelper::map(MobileCategory::find()->where(['status' => 1])->all(),'id','name'),
                    ['prompt' => 'Select']
                  )
                ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>

                <?= $form->field($model, 'status')->dropDownList([1 => 'Active', 0 => 'Inactive'],['prompt' =>
                    'Select']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
