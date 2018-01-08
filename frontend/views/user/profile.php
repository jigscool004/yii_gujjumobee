<?php
/**
 * Created by PhpStorm.
 * User: Jigar Kumar
 * Date: 1/2/2018
 * Time: 8:05 PM
 */
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'User Profile';
?>


<!-- Row -->
<div class="profile-section margin-bottom-20">
    <div class="profile-tabs">
        <?php echo $this->render('_tabmenu') ?>
        <div class="tab-content">
            <div id="edit" class="profile-edit tab-pane fade active in">
                <h2 class="heading-md">Manage Your Account</h2>

                <div class="clearfix"></div>
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>


                <div class="col-md-8 col-sm-8 col-xs-12">
                    <?= $form->field($model, 'name')->textInput(); ?>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <?= $form->field($model, 'email')->textInput(); ?>
                </div>

                <div class="col-md-8 col-sm-8 col-xs-12">
                    <?= $form->field($model, 'contact_number')->textInput(); ?>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php
                     $filePath = Yii::$app->basePath.'/web/uploads/profile_photos/'.$model->photo;
                    echo $form->field($model, 'photo')->widget(FileInput::classname(), [
                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => ['allowedFileExtensions' => ['jpg', 'gif', 'png'], 'showUpload' => false,
                            'browseClass' => 'btn btn-theme btn-primary btn-xs ', 'browseLabel' => 'Select Photo',
                            'initialPreview'=> [
                                Html::img($model->getImageUrl())
                            ],
                            'initialPreviewConfig' => [
                                [
                                    'caption' => $model->photo,
                                    //'width' => "120px",
                                    'url' => ["/user/delete"],
                                    'key' => $model->id,
                                ],

                            ],

                            'initialCaption'=> $model->photo,
                            'showRemove' => false,
                            'showPreview' => true,
                            'showCaption' => false,],
                    ]); ?>
                </div>

                <div class="col-md-8 col-sm-8 col-xs-12">
                    <?= Html::submitButton('Update My Info', ['class' => 'btn btn-theme']) ?>

                </div>
                <div class="clearfix"></div>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
    <!-- Row End -->
</div>
<!-- Middle Content Area  End -->
