<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AdpostMessage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adpost-message-form">

    <?php $form = ActiveForm::begin();
    
    $model->adpost_id = $id;
    ?>

    <?= $form->field($model, 'adpost_id')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'message')->textarea(['rows' => 6])->label(false) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
