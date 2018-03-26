<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

$this->title = $adpostModel->adtitle;
if ($viewLoad == 1) {
  echo $this->render('_view',['model' => $model]);
  Yii::$app->end();
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="panel panel-primary" style="border:none">
                <div class="panel-heading" id="accordion" style="background: #f58936">
                    <span class="glyphicon glyphicon-comment"></span> Message's for
                    <b><?php echo $adpostModel->adtitle ?></b>
                </div>
                <div class="panel-collapse " id="collapseOne">
                    <div class="panel-body">
                        <?php echo $this->render('_view',['model' => $model]); ?>

                    </div>
                    <div class="col-md-12">
                        <div class="sendMessage">
                            <?php
                            // Pjax::begin(['id' => 'adpostmessage-form']);
                            $form = ActiveForm::begin(['id' => 'sendMessage']); ?>
                            <?= $form->field($adpostModel, 'id')->hiddenInput()->label(false) ?>
                            <?= $form->field($adpostModel, 'message')->textarea(['class' => 'form-control', 'placeholder' => "Type your message here..."])->label(false) ?>
                            <div class="form-group">
                                <?= Html::submitButton('Send', ['class' => 'btn btn-light pull-right submitmessage']) ?>
                                <div class="clearfix"></div>
                            </div>
                            <?php ActiveForm::end();

                            ///Pjax::end();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#sendMessage").on('submit', function (e) {
            e.preventDefault();
            var $this = $(this),
                messageBtn = $(".submitmessage");
            if ($("#adpost-message").val() != '') {
                postData = $this.serialize();
                $("#adpost-message").val(' ');
                messageBtn.attr({
                    'disabled': 'disabled'
                }).text('Sending......');

                $.ajax({
                    url: $this.attr('action'),
                    method: 'POST',
                    data: postData,
                    success: function (data) {
                        messageBtn.removeAttr('disabled').text('Send');
                        $.ajax({
                            url: $this.attr('action') + "&view_load=1",
                            method: 'get',
                            success: function (htmlData) {

                                $('.panel-body').html(htmlData).animate({
                                    scrollTop: $(".chat > li:last").offset().top + 1000000
                                }, 1500);
                                console.log($(".chat > li:last"));
                            }
                        });
                    }
                });
            }

        })
    });
    function submitFunc(button) {
        $(button).attr('disabled', 'disabled').text('Sending..');
        //console.log(button);
    }
</script>
