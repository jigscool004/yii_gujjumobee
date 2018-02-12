<?php

/* @var $this yii\web\View */
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\MobileCategory;
use yii\helpers\Url;

$this->title = 'Gujjumobi | Home';
$mobilCategoryArr = MobileCategory::find()->where(['status' => 1])->All();

$mobileCategory = MobileCategory::find()->from('mobile_category t')->select(['t.name', 't.id', 'COUNT(a.id) AS total_ads'])
    ->leftJoin('adpost a', 'a.category = t.id AND a.status = 1 AND a.is_sold = 0 AND a.is_archived = 0 AND a.is_deleted = 0')->where(['t.status' =>
        1])
    ->groupBy('t.id')->all();

?>
<div class="main-search parallex" style="height: auto;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-search-title">
                    <h1>Find Whatever Your Want?</h1>
                    <!-- <p>Search <strong>267,241</strong> new ads - 83 added today</p> -->
                </div>
                <?php $form = ActiveForm::begin(['id' => 'serach', 'method' => 'get']); ?>
                <div class="search-section">
                    <div id="form-panel">
                        <div class="col-md-4">
                            <?= Select2::widget([
                                'name' => 'category',
                                'attribute' => 'category',
                                'data' => ArrayHelper::map($mobilCategoryArr, 'id', 'name'),
                                'options' => ['placeholder' => 'Select a Category ...', 'class' => 'category form-control select2-hidden-accessible', 'id' => 'category'],
                                'pluginOptions' => [
                                    'allowClear' => TRUE
                                ],
                            ]);
                            ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            echo Html::textInput('keyword', '', ['class' => 'form-control', 'id' => 'keyword']);
                            ?>
                        </div>
                        <div class="col-md-2">
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
    </div>
    <div class="main-content-area clearfix">
        <div class="custom-padding gray">
            <div class="container">
                <div class="row">
                    <?php foreach ($mobileCategory as $key => $mc) { ?>
                        <div class="col-md-3 col-xs-12 col-sm-6">
                            <div class="box">
                                <?php echo Html::img('@web/images/mobile.png', ['alt' => 'GujjuMobi']) ?>
                                <h4>
                                    <?php echo Html::a($mc->name, ['adpost/result/' . $mc->id]) ?>
                                </h4>
                                <strong><?php echo $mc->total_ads ?> Ads</strong>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {
        $('#serach').on('submit', function (e) {
            e.preventDefault();
            console.log($(this));
            var category = $("#category").val(),
                keyword = $("#keyword").val(),
                url = '<?php echo Url::to('adpost/result', TRUE); ?>' +  '?keyword=' + keyword + '&category=' +
                    category;
            if (category != "" || keyword != "") {
                window.location = url;
            }
            return false;

        });
    });
</script>
