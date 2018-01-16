<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Gujju</b>Mobee</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <p class="login-box-msg">Sign in to start your session</p>
            <div class="form-group has-feedback">
                <?= $form->field($model, 'username',
                    [ 'template' => "{label}\n{input}<span class=\"glyphicon glyphicon-envelope form-control-feedback\"></span>\n{hint}\n{error}",])->textInput(['autofocus' => true]) ?>


            </div>
            <div class="form-group has-feedback">
                <?= $form->field($model, 'password',
                    [ 'template' => "{label}\n{input}<span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>\n{hint}\n{error}",])->passwordInput() ?>

            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
                <!-- /.col -->
            </div>
        <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>
        <?php ActiveForm::end(); ?>
    </div>