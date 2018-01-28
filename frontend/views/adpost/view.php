<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Adpost */

$this->title = $model->adtitle;
$this->params['breadcrumbs'][] = ['label' => $model->mobileCategory->name, 'url' => '#'];
$this->params['breadcrumbs'][] = ['label' => $model->mobileModel->name, 'url' => '#'];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
?>
<div class="col-md-8 col-xs-12 col-sm-12">
    <div class="single-ad">
        <div class="ad-box">
            <h1><?= $model->adtitle; ?></h1>
            <div class="short-history">
                <ul>
                    <li>Published on: <b><?= date('d M Y', strtotime($model->created_on)) ?></b></li>
                    <li>Category: <b><a href="#"><?= $model->mobileCategory->name ?></a></b></li>
                    <li>Location: <b><?= $model->adpostArea->area ?></b></li>
                </ul>
            </div>
        </div>
        <div class="flexslider single-page-slider">

            <div class="flex-viewport" style="overflow: hidden; position: relative;">
                <ul class="slides slide-main"
                    style="width: 1000%; transition-duration: 0s; transform: translate3d(-3000px, 0px, 0px);">
                    <li class="" style="width: 750px; float: left; display: block;">
                        <img alt=""
                             src="http://local.gujjumobi.com/assest/upload/adpost_photos/00000002/vlcsnap-0446-06-16-07h11m11s049.png"
                             title="" style="height:420px" draggable="false"></li>
                    <li class="" style="width: 750px; float: left; display: block;">
                        <img alt=""
                             src="http://local.gujjumobi.com/assest/upload/adpost_photos/00000002/vlcsnap-0742-07-06-02h27m12s345.png"
                             title="" style="height:420px" draggable="false"></li>
                    <li class="" style="width: 750px; float: left; display: block;">
                        <img alt=""
                             src="http://local.gujjumobi.com/assest/upload/adpost_photos/00000002/vlcsnap-0742-07-06-02h27m12s3451.png"
                             title="" style="height:420px" draggable="false"></li>
                    <li class="" style="width: 750px; float: left; display: block;">
                        <img alt=""
                             src="http://local.gujjumobi.com/assest/upload/adpost_photos/00000002/vlcsnap-0812-04-29-08h38m11s713.png"
                             title="" style="height:420px" draggable="false"></li>
                    <li class="flex-active-slide" style="width: 750px; float: left; display: block;">
                        <img alt="" src="http://local.gujjumobi.com/assest/upload/adpost_photos/00000002/bhallaldev.png"
                             title="" style="height:420px" draggable="false"></li>
                </ul>
            </div>
            <ul class="flex-direction-nav">
                <li><a class="flex-prev" href="#"></a></li>
                <li><a class="flex-next flex-disabled" href="#" tabindex="-1"></a></li>
            </ul>
        </div>
    </div>
    <div class="flexslider" id="carousels">

        <div class="flex-viewport" style="overflow: hidden; position: relative;">
            <ul class="slides slide-thumbnail"
                style="width: 1000%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                <li class="flex-active-slide" style="margin-left: 10px; width: 100px; float: left; display: block;">
                    <img alt="" draggable="false"
                         src="http://local.gujjumobi.com/assest/upload/adpost_photos/00000002/vlcsnap-0446-06-16-07h11m11s049.png"
                         title="">
                </li>
                <li class="" width:100px="" !important;=""
                "="" style="width: 100px; float: left; display: block;">
                <img alt="" draggable="false"
                     src="http://local.gujjumobi.com/assest/upload/adpost_photos/00000002/vlcsnap-0742-07-06-02h27m12s345.png"
                     title="">
                </li>
                <li class="" width:100px="" !important;=""
                "="" style="width: 100px; float: left; display: block;">
                <img alt="" draggable="false"
                     src="http://local.gujjumobi.com/assest/upload/adpost_photos/00000002/vlcsnap-0742-07-06-02h27m12s3451.png"
                     title="">
                </li>
                <li class="" width:100px="" !important;=""
                "="" style="width: 100px; float: left; display: block;">
                <img alt="" draggable="false"
                     src="http://local.gujjumobi.com/assest/upload/adpost_photos/00000002/vlcsnap-0812-04-29-08h38m11s713.png"
                     title="">
                </li>
                <li class="" width:100px="" !important;=""
                "="" style="width: 100px; float: left; display: block;">
                <img alt="" draggable="false"
                     src="http://local.gujjumobi.com/assest/upload/adpost_photos/00000002/bhallaldev.png" title="">
                </li>

            </ul>
        </div>
        <ul class="flex-direction-nav">
            <li><a class="flex-prev flex-disabled" href="#" tabindex="-1"></a></li>
            <li><a class="flex-next flex-disabled" href="#" tabindex="-1"></a></li>
        </ul>
    </div>
    <div class="clearfix"></div>
    <div class="ad-box">
        <div class="short-features">
            <!-- Heading Area -->
            <div class="heading-panel">
                <h3 class="main-title text-left">
                    Description
                </h3>
            </div>
            <div class="col-sm-3 col-md-3 col-xs-12 no-padding">
                <span><strong>Brand</strong> :</span> <?= $model->mobileCategory->name ?>
            </div>
            <div class="col-sm-3 col-md-3 col-xs-12 no-padding">
                <span><strong>Model</strong> :</span> <?= $model->mobileModel->name ?>
            </div>
            <div class="col-sm-3 col-md-3 col-xs-12 no-padding">
                <span><strong>Date</strong> :</span> <?= date('d M Y', strtotime($model->created_on)) ?>
            </div>
            <div class="col-sm-3 col-md-3 col-xs-12 no-padding">
                <span><strong>Price</strong> :</span>
                <?= isset($model->price) && (int)$model->price > 0 ? number_format($model->price, 2) : '0' ?>
            </div>
        </div>
        <!-- Short Features  -->

        <!-- Related Image  -->
        <div class="ad-related-img">
            <img class="img-responsive center-block" alt="" src="images/car-img1.png">
        </div>
        <!-- Ad Specifications -->
        <div class="specification">
            <!-- Heading Area -->
            <div class="heading-panel">
                <h3 class="main-title text-left">
                    Specifications
                </h3>
            </div>
            <p><?= $model->ad_desc; ?></p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="col-md-4 col-xs-12 col-sm-12">
    <div class="sidebar">
        <div class="contact white-bg">
            <button data-target=".price-quote" data-toggle="modal" class="btn-block btn-contact contactEmail">Contact
                Seller Via Email
            </button>
            <button data-last="<?= $model->adpost_user_mobile ?>" class="btn-block btn-contact contactPhone number">
                +91-<?= $model->adpost_user_mobile ?></button>
        </div>
        <div class="ad-listing-price">
            <p>Rs. <?= isset($model->price) && (int)$model->price > 0 ? number_format($model->price, 2) : '0' ?></p>
        </div>
        <div class="white-bg user-contact-info">
            <div class="user-info-card">
                <div class="user-photo col-md-3 col-sm-3  col-xs-4">
                    <span class="glyphicon glyphicon-user pull-right" style="font-size: 45px;"></span>

                </div>
                <div class="user-information no-padding col-md-8 col-sm-9 col-xs-8">
                                    <span class="user-name"><a href="profile.html" class="hover-color">
Jigar Prajapati</a></span>
                    <div class="item-date">
                        <span class="ad-pub">Published on: <?= date('d M Y', strtotime($model->created_on)) ?></span><br>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="ad-listing-meta">
                <ul>
                    <li>Ad Id: <span class="color"><?= $model->adpost_id ?></span></li>
                    <li>Categories: <span class="color"><?= $model->mobileCategory->name ?></span></li>
                    <li>Visits: <span class="color">9</span></li>
                    <li>Location: <span class="color"><?= $model->adpostArea->area . " " .
                            $model->adpostCity->name ?></span>
                    </li>
                    <li class="padding-zero">
                    </li>
                </ul>
            </div>

            <div class="contact white-bg">
                <?php if (Yii::$app->user->isGuest == FALSE && Yii::$app->user->getId() === $model->adpost_user_id) : ?>
                    <div class="pull-left">
                        <div class="col-md-2">
                            <?php echo Html::a('<i aria-hidden="true" class="glyphicon glyphicon-edit"></i>',
                                ['adpost/update/' . $model->id], ['class' => '', 'data-toggle' =>
                                    'tooltip', 'data-placement' => 'top', 'title' => 'Edit']) ?>
                        </div>
                        <div class="col-md-2">
                            <?php echo Html::a('<i aria-hidden="true" class="glyphicon glyphicon-ok-circle"></i>',
                                ['adpost/update/' . $model->id], ['class' => '', 'data-toggle' =>
                                    'tooltip', 'data-placement' => 'top', 'title' => 'Mark as Sale']) ?>
                        </div>
                        <div class="col-md-2">
                            <?php echo Html::a('<i aria-hidden="true" class="glyphicon glyphicon-folder-open"></i>',
                                ['adpost/update/' . $model->id], ['class' => '', 'data-toggle' =>
                                    'tooltip', 'data-placement' => 'top', 'title' => 'Mark as Archive']) ?>

                        </div>
                    </div>
                <?php endif; ?>
                <div class="pull-right" style="margin-top:-5px;">
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <input type="hidden" name="" readonly="readonly" id="wishlistId" value="">
                                <span class="shareTip" title="" data-toggle="tooltip" data-original-title="Add Wishlist"
                                      id="wishList"><i class="fa fa-heart"></i>
                                </span>
                            </td>
                            <td>
                                <span class="shareTip" id="addClass" title=""
                                      data-toggle="tooltip" data-original-title="Send Message">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </td>
                          </tr>
                        </tbody>
                    </table>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('#carousels').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 100,
            itemMargin: 50,
            asNavFor: '.single-page-slider'
        });
        $('.single-page-slider').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: true,
            sync: "#carousel"
        });

    })
</script>
