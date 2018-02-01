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
            <?php
            $photos_dataArr = \yii\helpers\ArrayHelper::map($model->adpostPhotos, 'save_name', 'save_name');
            $filePath = $model->getFileUrl($model);
            ?>
            <div class="flex-viewport" style="overflow: hidden; position: relative;">
                <ul class="slides slide-main">
                    <?php
                    foreach ($photos_dataArr as $key => $photo) {
                        $activeclass = $key == 0 ? 'flex-active-slide' : '';
                        ?>
                        <li class="<?php echo $activeclass ?>">
                            <?php echo Html::img($filePath . '/' . $photo, ['alt' => '', 'style' => 'height:420px']); ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <ul class="flex-direction-nav">
                <li><a class="flex-prev" href="#"></a></li>
                <li><a class="flex-next flex-disabled" href="#" tabindex="-1"></a></li>
            </ul>
        </div>
    </div>
    <div class="flexslider" id="carousels">
        <div class="flex-viewport">
            <ul class="slides slide-thumbnail">
                <?php
                foreach ($photos_dataArr as $key => $photo) {
                    $activeclass = $key == 0 ? 'flex-active-slide' : '';
                    $style = $key == 0 ? 'style="margin-left:10px;width:100px !important;"' : 'width:100px !important; "';
                    ?>
                    <li class="<?php echo $activeclass; ?>" <?php echo $style ?>>
                        <?php echo Html::img($filePath . '/' . $photo, ['alt' => '', 'draggable' => FALSE,]); ?>
                    </li>
                <?php } ?>

            </ul>
        </div>
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
                    <div class="pull-left" style="margin-left: 10px;">
                        <?php echo Html::a('<i aria-hidden="true" class="glyphicon glyphicon-edit"></i>',
                            ['adpost/update/' . $model->id], ['class' => '', 'data-toggle' =>
                                'tooltip', 'data-placement' => 'top', 'title' => 'Edit']) ?>

                        <?php
                        if ($model->is_sold == 0) {
                            echo Html::a('<i aria-hidden="true" class="glyphicon glyphicon-ok-circle"></i>',
                                ['adpost/update/' . $model->id], ['class' => 'manage-sale-status', 'data-toggle' =>
                                    'tooltip', 'data-placement' => 'top', 'title' => 'Mark as Sold', 'data-id'
                                => $model->id, 'data-key' => 1]);
                        } else {
                            echo Html::a('<i aria-hidden="true" class="glyphicon glyphicon-ban-circle"></i>',
                                ['adpost/update/' . $model->id], ['class' => 'manage-sale-status', 'data-toggle' =>
                                    'tooltip', 'data-placement' => 'top', 'title' => 'Mark as Unsold', 'data-id' => $model->id, 'data-key' => 0]);
                        }
                        ?>

                        <?php
                          if ($model->is_archived == 0) {
                              echo Html::a('<i aria-hidden="true" class="glyphicon glyphicon-folder-open"></i>',
                                  ['adpost/update/' . $model->id], ['class' => 'manage-adpost-archive', 'data-toggle' =>
                                      'tooltip', 'data-placement' => 'top', 'title' => 'Mark as Archive', 'data-id'
                                  => $model->id, 'data-key' => 1]);
                          }  else {
                              echo Html::a('<i aria-hidden="true" class="glyphicon glyphicon-folder-close"></i>',
                                  ['adpost/update/' . $model->id], ['class' => 'manage-adpost-archive', 'data-toggle' =>
                                      'tooltip', 'data-placement' => 'top', 'title' => 'Mark as Unarchive', 'data-id'
                                  => $model->id, 'data-key' => 0]);
                          }
                         ?>


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


        $('.manage-adpost-archive').on('click',function (e) {
            e.preventDefault();
            var $this = $(this),
                isArchiveValue = $this.attr('data-key');
            dataString = {
                'adpost_id':$this.attr('data-id'),
                'is_archived' : isArchiveValue
            };

            bootbox.confirm({
                message: "Are you sure..?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result) {
                        $.ajax({
                            url: '<?php echo Yii::$app->urlManager->createUrl('adpost/managearchivestatus') ?>',
                            method: 'POST',
                            data:dataString,
                            //dataType: 'json',
                            success: function (data) {
                                if (data == 1) {
                                    newIsArchiveValue = isArchiveValue == 1 ? 0 : 1;
                                    title = isArchiveValue == 1 ? 'Mark as UnArchive' : 'Mark as Archive';
                                    $this.attr({
                                        'data-key' : newIsArchiveValue,
                                        'title' : title,
                                        'data-original-title':title
                                    });
                                    $iconI = $this.find('i');
                                    if ($iconI.hasClass('glyphicon-folder-open')) {
                                        $iconI.removeClass('glyphicon-folder-open').addClass('glyphicon-folder-close');
                                    } else if ($iconI.hasClass('glyphicon-folder-close')) {
                                        $iconI.removeClass('glyphicon-folder-close').addClass('glyphicon-folder-open');
                                    }
                                }
                            }
                        });
                    }
                }
            });

        });

        $('.manage-sale-status').on('click',function (e) {
            e.preventDefault();
            var $this = $(this),
                isSoldValue = $this.attr('data-key');
                dataString = {
                    'adpost_id':$this.attr('data-id'),
                    'is_sold' : isSoldValue
            };

            bootbox.confirm({
                message: "Are you sure..?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result) {
                        $.ajax({
                            url: '<?php echo Yii::$app->urlManager->createUrl('adpost/managestatus') ?>',
                            method: 'POST',
                            data:dataString,
                            //dataType: 'json',
                            success: function (data) {
                                if (data == 1) {
                                    newIsSoldValue = isSoldValue == 1 ? 0 : 1;
                                    title = isSoldValue == 1 ? 'Mark as Unsold' : 'Mark as sold';
                                    $this.attr({
                                        'data-key' : newIsSoldValue,
                                        'title' : title,
                                        'data-original-title':title
                                    });
                                    $iconI = $this.find('i');
                                    if ($iconI.hasClass('glyphicon-ok-circle')) {
                                        $iconI.removeClass('glyphicon-ok-circle').addClass('glyphicon-ban-circle');
                                    } else if ($iconI.hasClass('glyphicon-ban-circle')) {
                                        $iconI.removeClass('glyphicon-ban-circle').addClass('glyphicon-ok-circle');
                                    }
                                }
                            }
                        });
                    }
                }
            });

        });

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
