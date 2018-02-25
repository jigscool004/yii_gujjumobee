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
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\base\View;
$this->title = 'Gujjumobi | Home';
$mobilCategoryArr = MobileCategory::find()->where(['status' => 1])->All();
//
?>
<style>
    .btnHoverCls{background:#f58936;color:#fff;}
</style>
<script>
    var isLoggedIn = '<?php echo (int)!Yii::$app->user->isGuest;?>'
</script>
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
                            'options' => ['placeholder' => 'Select a Category ...', 'class' => 'category form-control select2-hidden-accessible','id' => 'category'],
                            'pluginOptions' => [
                                'allowClear' => TRUE
                            ],
                        ]);
                        ?>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-4 ">
                        <?php echo Html::textInput('keyword', $keyword, ['class' => 'form-control','placeholder' => "Enter your keyword",'id' => 'keyword']); ?>
                    </div>
                    <div class="col-md-3 col-xs-12 col-sm-4 ">
                        <?= Html::submitButton('Search',
                            ['class' => 'btn btn-light btn-sm btn-block', 'name' => 'Search', 'style' =>
                                'padding:8px;font-weight:bold']) ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</dicv>
<section class="section-padding pattern_dots">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sx-12">
                <?php
                Pjax::begin(['id' => 'adpostlist-grid']);
                echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'options' => [
                        'tag' => 'div',
                        'class' => 'list-wrapper',
                        'id' => 'list-wrapper',
                    ],
                    'viewParams' => ['adWishListArr' => $adWishListArr],
                //    'itemOptions' => ['class' => 'col-md-6 col-sm-6 col-xs-12'],
                    'layout' => "<div class='filter-brudcrums' style='margin-bottom: 10px;'>{summary}</div><div class=\"clearfix\"></div>    <ul class='list-unstyled'>{items}</ul>
                       <div class='clearfix'></div>",
                    'itemView' => '_list_item',
                ]);

                echo LinkPager::widget([
                    'pagination' => $dataProvider->pagination
                ]);
                Pjax::end();
                ?>
            </div>
        </div>
    </div>
</section>
<?php $this->registerJsFile(Yii::$app->urlManager->createUrl('js/jquery.toaster.js'), ['depends' => [yii\web\JqueryAsset::className()]]); ?>
<?php $this->registerJsFile(Yii::$app->urlManager->createUrl('js/common.js'), ['depends' => [yii\web\JqueryAsset::className()]]);
//
//$this->registerJs(
//    "$('[data-toggle=\"tooltip\"]').tooltip();",
//     \yii\web\View::POS_END
//    //'my-button-handler'
//);
?>
<script type="text/javascript">

    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        //$.toaster({ priority : 'success',  message : 'Your ad status is '});
        $('#serach').on('submit',function (e) {
            e.preventDefault();
            var $this = $(this);
                var options = {
                    type: 'get',
                    url: $this.attr('action'),
                    container: '#adpostlist-grid', // id to update content
                    data: $this.serialize()
                };
            $.pjax.reload(options);
        });
        });
</script>
