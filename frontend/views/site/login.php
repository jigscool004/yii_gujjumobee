<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = ['label' => 'Login', 'url' => '#', 'class' => 'active'];
?>
<div class="">

    <div class="row">
        <div class="col-md-5 col-md-push-7 col-sm-6 col-xs-12">
            <div class="form-grid">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="form-group">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class' => 'form-control']) ?>
                </div>


                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control']) ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-theme btn-lg btn-block', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>

        </div>
        <div class="col-md-7  col-md-pull-5  col-xs-12 col-sm-6">
            <div class="heading-panel">
                <h3 class="main-title text-left">
                    Sign In to your account
                </h3>
            </div>
            <div class="content-info">
                <div class="features">
                    <div class="features-icons">
                        <?php echo Html::img('@web/images/icons/chat.png',['alt' => 'GujjuMobi'])?>
                    </div>
                    <div class="features-text">
                        <h3>Chat &amp; Messaging</h3>
                        <p>
                            Access your chats and account info from any device.
                        </p>
                    </div>
                </div>
                <div class="features">
                    <div class="features-icons">
                        <?php echo Html::img('@web/images/icons/panel.png',['alt' => 'GujjuMobi'])?>
                    </div>
                    <div class="features-text">
                        <h3>User Dashboard</h3>
                        <p>
                            Maintain a wishlist by saving your favourite items.
                        </p>
                    </div>
                </div>
                <span class="arrowsign hidden-sm hidden-xs"><img alt="" src="images/arrow.png"></span>
            </div>
        </div>
    </div>
</div>
