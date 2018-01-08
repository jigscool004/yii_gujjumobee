<?php
/**
 * Created by PhpStorm.
 * User: Jigar Kumar
 * Date: 1/6/2018
 * Time: 1:12 AM
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Change Password';

?>
<div class="profile-section margin-bottom-20">
    <div class="profile-tabs">
        <?php echo $this->render('_tabmenu') ?>
        <div class="tab-content">
            <div id="edit" class="profile-edit tab-pane fade active in">
                <h2 class="heading-md">Change Your Account Password</h2>


                <?php $form = ActiveForm::begin() ?>

                <div class="col-md-8 col-sm-8 col-xs-12">
                    <?= $form->field($model, 'password')->passwordInput(); ?>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <?= $form->field($model, 'new_password')->passwordInput(); ?>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <?= $form->field($model, 'confirm_password')->passwordInput(); ?>
                </div>

                <div class="col-md-8 col-sm-8 col-xs-12">
                    <?= Html::submitButton('Change Password', ['class' => 'btn btn-theme']) ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php ActiveForm::end() ?>
            <div class="clearfix"></div>
        </div>

    </div>
    <!-- Row End -->
</div>
