<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\AdpostMessage */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Adpost Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adpost-message-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'adpost_id',
            'user_id',
            'message:ntext',
            'is_sent',
            'is_deleted',
            'is_archived',
            'created_on',
        ],
    ]) ?>

</div>
