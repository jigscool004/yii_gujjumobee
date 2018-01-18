<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\City */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">

    <div class="box box-info">
        <div class="box-body">
            <div class="col-md-8">
                <?php $form = ActiveForm::begin(
                    [
                       // 'options' => ['class' => 'form-horizontal'],
//                        'fieldConfig' => [
//                            'template' => "{label}\n<div class=\"col-lg-6\">{input}{error}</div>",
//                            'labelOptions' => ['class' => 'col-lg-1 control-label'],
//                        ]
                    ]
                ); ?>

                <?= $form->field($model, 'name')->textInput() ?>

                <?= $form->field($model, 'status')->dropDownList(array(1 => 'Active', 0 => 'Inactive'),['prompt' => 'Select']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>
</div>