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
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\Adpost */
/* @var $form yii\widgets\ActiveForm */

?>
<style>
    .file-preview .btn-xs {
        padding: 2px 0px 2px 5px;
        margin-top: 5px;
    }
</style>
<div class="adpost-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <?= $form->field($model, 'adtitle')->textInput(['maxlength' => TRUE]) ?>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            <?= $form->field($model, 'category')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(MobileCategory::find()->where(['status' => 1])->All(), 'id', 'name'),
                'options' => ['placeholder' => 'Select a Category ...', 'class' => 'depentantDropdown', 'target-id' =>
                    'adpost-model'],
                'pluginOptions' => [
                    'allowClear' => TRUE
                ],
            ]); ?>
        </div>
        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            <?= $form->field($model, 'model')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(MobileModel::find()->where(['status' => 1])->All(), 'id', 'name'),
                'options' => ['placeholder' => 'Select a Model ...'],
                'pluginOptions' => [
                    'allowClear' => TRUE
                ],
            ]);


            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <?php
            $filePath = $model->getFileUrl($model);
            //             $previewArr = array_map(function($key) use ($filePath) {
            //                                return Html::img($filePath . "/" . $key);
            //                                },
            //                                ArrayHelper::map($model->adpostPhotos,'save_name','save_name')
            //                           );
            $previewPhotoArr = $previewPhotoConfigArr = array();
            if (isset($model->adpostPhotos) && count($model->adpostPhotos) > 0) {
                foreach ($model->adpostPhotos as $key => $document) {
                    $previewPhotoArr[$key] = Html::img($filePath . '/' . $document->save_name, ['data-id' =>
                        $document->id]);
                    $previewPhotoConfigArr[$key] = [
                        'caption' => $document->document_name,
                        'key' => $document->id,
                        // 'width'   => '120px'
                        'url' => ["/adpost/adpostphotodelete/" . $document->id],
                    ];
                }
            }

            echo $form->field($model, 'fileName[]')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*', 'multiple' => TRUE],
                'pluginOptions' => [
                    'uploadUrl' => Url::to(['/site/file-upload']),
                    'allowedFileExtensions' => ['jpg', 'gif', 'png'], 'showUpload' => FALSE,
                    'browseClass' => 'btn btn-theme btn-primary btn-xs ', 'browseLabel' => 'Select Photo',
                    'maxFileCount' => 5,
                    'initialPreview' => $previewPhotoArr,
                    'initialPreviewConfig' => $previewPhotoConfigArr,
                    'showRemove' => FALSE,
                    'overwriteInitial' => FALSE,
//                    'fileActionSettings' => [
//                        'removeIcon' => '<span class="icon">delete</span> ',
//                    ],
                    'layoutTemplates' => ['footer' => '<button type="button" onclick="removePhoto(this); return false;"
class="btn btn-danger btn-xs pull-right removeImage"><i class="glyphicon glyphicon-trash"></i></button>'],
                    'showPreview' => TRUE,
                    'showCaption' => FALSE,],
            ]);
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
            <?= $form->field($model, 'city')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(City::find()->where(['status' => 1])->All(), 'id', 'name'),
                'options' => ['placeholder' => 'Select a City ...', 'class' => 'depentantDropdown form-control', 'target-id' => 'adpost-location'],
                'pluginOptions' => [
                    'allowClear' => TRUE
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            <?= $form->field($model, 'location')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Area::find()->where(['status' => 1])->All(), 'id', 'area'),
                'options' => ['placeholder' => 'Select a City ...', 'class' => 'depentantDropdown form-control', 'target-id' => 'adpost-zipcode'],
                'pluginOptions' => [
                    'allowClear' => TRUE
                ],
            ]);
            ?>
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
<?php
/*$this->registerJs("
    function removePhoto(button) {
        var id = $(button).siblings('.kv-file-content').find('img').attr('data-id');
        bootbox.confirm({
            message: \"This is a confirm with custom button text and color! Do you like it?\",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result == true) {
                    $.ajax({
                        url: '".Yii::$app->urlManager->createUrl('adpost/adpostphotodelete/'). "' + id,
                        method: 'POST',
                        dataType: 'json',
                        success: function (data) {
                        }
                    });
                }
            }
        });

    }
", Yii\web\View::POS_READY); */
?>
<script type="text/javascript">
    function removePhoto(button) {
        var id = $(button).siblings('.kv-file-content').find('img').attr('data-id');
        bootbox.confirm({
            message: "Are you sure..?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result == true) {
                    $.ajax({
                        url: '<?php echo Yii::$app->urlManager->createUrl('adpost/adpostphotodelete') ?>/' + id,
                        method: 'POST',
                        dataType: 'json',
                        success: function (data) {
                            if (data == 1) {
                                $(button).parent('.file-preview-initial').remove();
                            }
                        }
                    });
                }
            }
        });

    }

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