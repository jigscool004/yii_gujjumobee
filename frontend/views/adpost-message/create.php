<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use frontend\models\Adpost;

/* @var $this yii\web\View */
/* @var $model frontend\models\AdpostMessage */

$this->title = 'Create Adpost Message';
$this->params['breadcrumbs'][] = ['label' => 'Adpost Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
Pjax::begin(['id' => 'adpost-messageform']);
$form = ActiveForm::begin(['id' => 'adpostmsg', 'enableAjaxValidation' => true, 'options' => ['data-pjax' => true]]);
$model->adpost_id = $id;
$adpostModal = Adpost::findOne($id);
if (isset($adpostModal) && count($adpostModal) > 0) {
    if ($adpostModal->adpost_user_id == Yii::$app->user->getId()) { ?>
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <p>You can not send message to your own adpost.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" style="text-transform: capitalize" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
<?php } else { ?>
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title pull-left">Send Message</h4>
                </div>
                <div class="modal-body">
                    <?= $form->field($model, 'adpost_id')->hiddenInput()->label(false) ?>
                    <?= $form->field($model, 'message')->textarea(['rows' => 6, 'placeholder' => 'type your message here...'])->label(false) ?>
                </div>
                <div class="modal-footer">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
<?php }
 }
?>

<?php ActiveForm::end();
Pjax::end();
?>
<script type="text/javascript">

    $("#adpostmsg").on('submit', function (e) {
        e.preventDefault();
        var $this = $(this);
        $.ajax({
            type: 'post',
            url: $this.attr('action'),
            data:$this.serialize(),
            success : function (data) {
                if (data == 1) {
                     $(".close").trigger('click');
                     return false;
                } else {
                    $("#adMessageBox").html(data);
                }
            }
        });

        return false;
    });
</script>