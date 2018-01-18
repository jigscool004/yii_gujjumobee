<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MobileModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mobile Models';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <?= Html::a('Create Mobile Model', ['create'], ['class' => 'btn btn-sm pull-right btn-success']) ?>
            </div>
            <div class="box-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        [
                            'attribute' => 'category_id',
                            'value' => 'mobileCategory.name'
                        ],
                        'name',
                        [
                            'attribute' => 'status',
                            'value' => function($model) {
                                return $model->status == 1 ? 'Active' : 'Inactive';
                            },
                            'filter' => Html::dropDownList('MobileModelSearch[status]',
                                    isset($_REQUEST['MobileModelSearch']['status']) ?
                                        $_REQUEST['MobileModelSearch']['status'] : '',
                                        [1 => 'Active', 0 => 'Inactive'],
                                        ['prompt' => 'Select', 'class' => 'form-control']
                                )
                        ],
                        //'created_by',
                        //'created_on',
                        //'updated_on',
                        //'update_by',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
