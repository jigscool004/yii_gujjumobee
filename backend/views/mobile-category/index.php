<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MobileCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mobile Categories';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <?= Html::a('Create Mobile Category', ['create'], ['class' => 'btn btn-sm pull-right btn-success']) ?>
            </div>
            <div class="box-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                      //  'id',
                        'name',
                        [
                            'attribute' => 'status',
                            'value' => function($model) {
                                return $model->status == 1 ? 'Active' : 'Inactive';
                            },
                            'filter' => Html::dropDownList('MobileCategorySearch[status]',
                                isset($_REQUEST['MobileCategorySearch']['status']) ?
                                    $_REQUEST['MobileCategorySearch']['status'] : '',
                                [1 => 'Active', 0 => 'Inactive'],
                                ['prompt' => 'Select', 'class' => 'form-control']
                            )
                        ],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
