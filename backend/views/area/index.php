<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AreaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Areas';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <?= Html::a('Create Area', ['create'], ['class' => 'btn btn-sm pull-right btn-success']) ?>
            </div>
            <div class="box-body">
                <?php Pjax::begin(); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                     //   'id',
                        'area',
                        [
                            'attribute' => 'city_id',
                            'value' => 'cityDetail.name'
                        ],
                        'zipcode',
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return $model->status == 1 ? "Active" : "Inactive";
                            },
                            'filter' => Html::dropDownList('CitySearch[status]', isset($_REQUEST['CitySearch']['status']) ? $_REQUEST['CitySearch']['status'] : '', [1 => 'Active', 0 => 'Inactive'], array('class' => 'form-control', 'prompt' => 'Select'))
                        ],
                        //'created_on',
                        //'created_by',
                        //'updated_on',
                        //'updated_by',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>