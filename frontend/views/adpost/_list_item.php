<?php
/**
 * Created by PhpStorm.
 * User: Jigar Kumar
 * Date: 2/7/2018
 * Time: 5:12 PM
 */
use yii\helpers\Html;
use yii\helpers\Url;

$firstPhotoName = isset($model->adpostPhotos[0]->save_name) ? $model->adpostPhotos[0]->save_name : '';
$total_photos = count($model->adpostPhotos);
$filePath = $model->getFileUrl($model);
$fileAbsolutePath = $model->getFilePath($model);
$image = '';
if ($firstPhotoName != '' && file_exists($fileAbsolutePath . '/' . $firstPhotoName)) {
    $image = $filePath . '/' . $firstPhotoName;
} else {
    $image = Yii::$app->urlManager->baseUrl . '/images/default.png';
}
?>
<li>
    <div class="well ad-listing clearfix">
        <div class="col-md-3 col-sm-5 col-xs-12 grid-style no-padding">
            <div class="img-box">
                <img class="img-responsive" src="<?php echo $image ?>"
                     alt="<?php echo $model->adtitle;
                     ?>">
                <div class="total-images">
                    <strong><?php echo $total_photos . " Photos"?></strong>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-7 col-xs-12">
            <div class="row">
                <div class="content-area">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <h3><?php echo Html::a($model->adtitle, ['adpost/' . $model->id]) ?></h3>
                        <ul class="additional-info pull-right">
                            <li>
                                <a class="shareTip bootstrapModel" href="#myModal2" id="2" title=""
                                   data-toggle="tooltip" data-original-title="Send Message"><i
                                            class="fa fa-envelope"></i></a>
                            </li>
                            <li>
                                <span class="shareTip wishlistClass" title="" data-toggle="tooltip"
                                      data-original-title="Add Wishlist" id="wishList" data-id="2"><i
                                            class="fa fa-heart"></i></span>
                            </li>
                        </ul>
                        <ul class="ad-meta-info pull-left">
                            <li><i class="fa fa-map-marker"></i>
                                <a href="#"><?= $model->adpostArea->area ?></a>
                            </li>
                            <li>
                                <i class="fa fa-clock-o"></i>
                                8 months ago
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        <div class="ad-details">
                            <?= $model->ad_desc; ?>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12 col-sm-12">
                        <!-- Ad Stats -->
                        <div class="short-info">
                            <div class="ad-stats hidden-xs">
                                <span>User : </span><?php echo $model->adpostUser->name; ?>
                            </div>
                        </div>
                        <div class="short-info">
                            <div class="ad-stats hidden-xs">
                                <span>Category : </span><?= $model->mobileCategory->name ?>
                            </div>
                        </div>
                        <div class="short-info">
                            <div class="ad-stats hidden-xs">
                                <span>Model : </span><?= $model->mobileModel->name ?>
                            </div>
                        </div>
                        <!-- Price -->
                        <div class="price">
                            <span>Rs.<?= isset($model->price) && (int)$model->price > 0 ? number_format($model->price, 2) : '0' ?></span>
                        </div>
                        <!-- Ad View Button -->
                        <?php
                        echo Html::a('<button class="btn btn-block btn-success"><i aria-hidden="true" class="fa fa-eye"></i>
                                View Ad.
                            </button>', ['adpost/' . $model->id]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>

