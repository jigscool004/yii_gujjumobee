<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AdpostMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adpost Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adpost-message-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Adpost Message', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'adpost_id',
            'user_id',
            'message:ntext',
            'is_sent',
            //'is_deleted',
            //'is_archived',
            //'created_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
