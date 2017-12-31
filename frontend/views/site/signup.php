<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#', 'class' => 'active'];
?>
<div class="col-md-5 col-md-push-7 col-sm-12 col-xs-12">
    <div class="form-grid">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>



        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'contact_number') ?>
        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>


        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Signup', ['class' => 'btn btn-theme btn-lg btn-block', 'name' => 'signup-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<div class="col-md-7  col-md-pull-5  col-sm-12 col-xs-12">
    <div class="heading-panel">
        <h3 class="main-title text-left">
            Create Your Account
        </h3>
    </div>
    <div class="content-info">
        <div class="features">
            <div class="features-icons">
                <img alt="img" src="http://local.gujjumobi.com/assest/front/images/icons/chat.png">
            </div>
            <div class="features-text">
                <h3>Messaging</h3>
                <p>
                    Access your messages and account info from any device.
                </p>
            </div>
        </div>
        <div class="features">
            <div class="features-icons">
                <img alt="img" src="http://local.gujjumobi.com/assest/front/images/icons/panel.png">
            </div>
            <div class="features-text">
                <h3>User Dashboard</h3>
                <p>
                    Maintain a wishlist by saving your favourite items.
                </p>
            </div>
        </div>

        <div class="features">
            <div class="features-icons">
                <img alt="img" src="http://local.gujjumobi.com/assest/front/images/icons/featured-listing.png">
            </div>
            <div class="features-text">
                <h3>features Listing</h3>
                <p>
                    Get more value fro your ad.
                </p>
            </div>
        </div>
        <span class="arrowsign hidden-sm hidden-xs"><img alt="" src="images/arrow.png"></span>
    </div>
</div>