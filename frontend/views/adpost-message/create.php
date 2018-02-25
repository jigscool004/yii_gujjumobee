<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model frontend\models\AdpostMessage */

$this->title = 'Create Adpost Message';
$this->params['breadcrumbs'][] = ['label' => 'Adpost Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
Pjax::begin(['id' => 'adpost-messageform']);
$form = ActiveForm::begin(['id' => 'adpostmsg','enableAjaxValidation' => true]);
$model->adpost_id = $id;

?>
<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
            <h4 class="modal-title pull-left">Send Message</h4>
        </div>
        <div class="modal-body">
            <?= $form->field($model, 'adpost_id')->hiddenInput()->label(false) ?>
            <?= $form->field($model, 'message')->textarea(['rows' => 6,'placeholder' => 'type your message here...'])->label(false) ?>
        </div>
        <div class="modal-footer">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); 
              Pjax::end();
?>
<script type="text/javascript">
    
$("#adpostmsg").on('submit',function(e) {
          e.preventDefault();
            var $this = $(this);
                var options = {
                    type: 'post',
                    url: $this.attr('action'),
                    //container: '#adpostlist-grid', // id to update content
                    data: $this.serialize()
                };
                console.log(options);
            $.pjax.reload(options); 
            return false;
});
</script>