<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AdpostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adposts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adpost-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Adpost', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'adpost_id',
            'adtitle',
            'adpost_user_id',
            'category',
            //'price',
            //'model',
            //'ad_desc:ntext',
            //'ad_tag',
            //'adpost_username',
            //'adpost_user_mobile',
            //'city',
            //'location',
            //'zipcode',
            //'created_on',
            //'status',
            //'is_archived',
            //'is_deleted',
            //'updated_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
