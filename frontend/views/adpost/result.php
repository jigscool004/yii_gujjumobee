<?php
/**
 * Created by PhpStorm.
 * User: Jigar Kumar
 * Date: 2/7/2018
 * Time: 6:47 AM
 */
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\MobileCategory;
use yii\widgets\ListView;
use yii\widgets\LinkPager;
$this->title = 'Gujjumobi | Home';
$mobilCategoryArr = MobileCategory::find()->where(['status' => 1])->All();
?>
<div id="search-section">
    <div class="container">
        <?php $form = ActiveForm::begin(['id' => 'serach','method' => 'get']); ?>
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="col-md-3 col-xs-12 col-sm-4">
                        <?= Select2::widget([
                            'name' => 'category',
                            'value' => $id,
                            'data' => ArrayHelper::map($mobilCategoryArr, 'id', 'name'),
                            'options' => ['placeholder' => 'Select a Category ...', 'class' => 'category form-control select2-hidden-accessible'],
                            'pluginOptions' => [
                                'allowClear' => TRUE
                            ],
                        ]);
                        ?>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-4 ">
                        <?php echo Html::textInput('keyword', $keyword, ['class' => 'form-control','placeholder' => "Enter your keyword"]); ?>
                    </div>
                    <div class="col-md-3 col-xs-12 col-sm-4 ">
                        <?= Html::submitButton('Search',
                            ['class' => 'btn btn-danger btn-sm btn-block', 'name' => 'Search', 'style' => 'background-color: #2d343d;
                                border-color: #2d343d;padding:8px']) ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<section class="section-padding pattern_dots">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sx-12">
                <?php

                echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'options' => [
                        'tag' => 'div',
                        'class' => 'list-wrapper',
                        'id' => 'list-wrapper',
                    ],
                //    'itemOptions' => ['class' => 'col-md-6 col-sm-6 col-xs-12'],
                    'layout' => "<div class='filter-brudcrums' style='margin-bottom: 10px;'>{summary}</div>\n <ul class='list-unstyled'>{items}</ul>
                       <div class='clearfix'></div>",
                    'itemView' => '_list_item',
                ]);

                echo LinkPager::widget([
                    'pagination' => $dataProvider->pagination
                ]);
                ?>
            </div>
        </div>
    </div>
</section>
