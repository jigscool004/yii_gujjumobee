<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\MobileCategory;
use backend\models\MobileModel;
use backend\models\City;
use backend\models\Area;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Adpost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adpost-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <?= $form->field($model, 'adtitle')->textInput(['maxlength' => TRUE]) ?>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            <?= $form->field($model, 'category')->dropDownList(
                ArrayHelper::map(MobileCategory::find()->where(['status' => 1])->All(), 'id', 'name'),
                ['prompt' => 'Select Category', 'class' => 'category depentantDropdown form-control', 'target-id' => 'adpost-model']
            ); ?>
        </div>
        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            <?= $form->field($model, 'model')->dropDownList(
                ArrayHelper::map(MobileModel::find()->where(['status' => 1])->All(), 'id', 'name'),
                ['prompt' => 'Select Model']
            ); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <?php // $form->field($model, 'fileName[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
            <?php

            echo $form->field($model,'fileName[]')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*', 'multiple' => TRUE],
                'pluginOptions' => [
                    'uploadUrl' => Url::to(['/site/file-upload']),
                    'allowedFileExtensions' => ['jpg', 'gif', 'png'], 'showUpload' => FALSE,
                    'browseClass' => 'btn btn-theme btn-primary btn-xs ', 'browseLabel' => 'Select Photo',
                    'maxFileCount' => 5,
                    'initialPreview' => [
                        //   Html::img($model->getImageUrl())
                    ],
                    /*'initialPreviewConfig' => [
                        [
                            'caption' => $model->photo,
                            //'width' => "120px",
                            'url' => ["/user/delete"],
                            'key' => $model->id,
                        ],

                    ],*/

                    //  'initialCaption'=> $model->photo,
                    'showRemove' => FALSE,
                    'layoutTemplates' => ['footer' => ''],
                    'showPreview' => TRUE,
                    'showCaption' => FALSE,],
            ]);
//             echo FileInput::widget([
//                 'model' => $model,
//                 'attribute' => 'fileName[]',
//                 'options' => [
//                     'multiple' => TRUE
//                 ],
//                 'pluginOptions' => [
//                     'uploadUrl' => Url::to(['/site/file-upload']),
//                     'allowedFileExtensions' => ['jpg', 'gif', 'png'],
//                     'showUpload' => FALSE,
//                     'browseClass' => 'btn btn-theme btn-primary btn-xs ',
//                     'browseLabel' => 'Select Photo',
//                     'maxFileCount' => 5,
//                     'initialPreview' => [
//                         // Html::img($model->getImageUrl())
//                     ],
//                     'showRemove' => FALSE,
//                     'showPreview' => TRUE,
//                     'showCaption' => FALSE,
//                     'layoutTemplates' => ['footer' => '']
//                 ]
//             ]);
            ?>
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
        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            <?= $form->field($model, 'adpost_username')->textInput(['maxlength' => TRUE]) ?>
        </div>
        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            <?= $form->field($model, 'adpost_user_mobile')->textInput(['maxlength' => TRUE]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            <?= $form->field($model, 'city')->dropDownList(
                ArrayHelper::map(City::find()->where(['status' => 1])->All(), 'id', 'name'),
                ['prompt' => 'Select City', 'class' => 'depentantDropdown form-control', 'target-id' => 'adpost-location']
            ); ?>
        </div>
        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            <?= $form->field($model, 'location')->dropDownList(
                ArrayHelper::map(Area::find()->where(['status' => 1])->All(), 'id', 'area'),
                ['prompt' => 'Select Location', 'class' => 'depentantDropdown form-control', 'target-id' => 'adpost-zipcode']
            ) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <?= $form->field($model, 'zipcode')->textInput() ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Submit Ads' : 'Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        $(".depentantDropdown").on("change", function () {
            var $this = $(this),
                targetId = $this.attr('target-id'),
                dataString = {
                    id: $this.val(),
                    fieldType: targetId
                };
            $.ajax({
                url: '<?php echo Yii::$app->urlManager->createUrl('adpost/getfieldvalues');?>',
                data: dataString,
                method: 'POST',
                dataType: 'json',
                success: function (data) {
                    if (targetId == 'adpost-zipcode') {
                        $("#" + targetId).val(data);
                    } else {
                        $htmlString = '<option value="">Select</option>';
                        $.each(data, function (i, v) {
                            $htmlString += '<option value="' + i + '">' + v + '</option>';
                        });
                        $("#" + targetId).html($htmlString);
                    }

                }

            });
        });
    });
</script>