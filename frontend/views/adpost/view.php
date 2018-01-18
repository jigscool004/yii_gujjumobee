<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Adpost */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Adposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adpost-view">

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
            'adtitle',
            'adpost_user_id',
            'category',
            'price',
            'model',
            'ad_desc:ntext',
            'ad_tag',
            'adpost_username',
            'adpost_user_mobile',
            'city',
            'location',
            'zipcode',
            'created_on',
            'status',
            'is_archived',
            'is_deleted',
            'updated_on',
        ],
    ]) ?>

</div>
