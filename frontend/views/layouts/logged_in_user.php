<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="colored-header">
    <?php echo $this->render('_header') ?>
</div>
<div class="page-header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-page">
                    <h1><?php echo $this->title; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="small-breadcrumb">
    <div class="container">
        <div class=" breadcrumb-link">
            <?= Breadcrumbs::widget([
                'itemTemplate' => "<li>{link}</li>\n", // template for all link
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'options' => ['class' => '']
            ]) ?>

        </div>
    </div>
</div>
<div class="main-content-area clearfix">
    <section class="custom-padding-3 gray">
        <div class="container">
            <div class="col-md-4 col-sm-12 col-xs-12 leftbar-stick blog-sidebar"
                 style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static;">
                    <div class="user-profile">
                        <a href="<?php echo Url::to('user/profile',true)?>">
                            <img id="profilepic" alt=""
                                 src="http://local.gujjumobi.com/assest/upload/user_profile/Koala1.jpg"
                                 class="img-thumbnail span-xs"></a>
                        <form id="change-profile" method="POST">
                           <span class="btn btn-default btn-file btn-xs">
                           <i class="icon-box-icon flaticon-photo-camera" style="font-size:14px;"></i> &nbsp;&nbsp;Browse
                              <input type="file" name="upload" id="upload">
                           </span>

                        </form>
                        <div class="profile-detail">
                            <h6><?php echo Yii::$app->session->get('name')?></h6>
                            <ul class="contact-details">

                                <li>
                                    <i class="fa fa-envelope"></i><?php echo Yii::$app->session->get('email')?>
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i> +91-<?php echo Yii::$app->session->get('contact_number')?>
                                </li>
                            </ul>
                        </div>
                        <?php
                            $itemArr = [
                                ['label' => 'Dashboard','url' => ['user/index']],
                                ['label' => 'Profile &amp; Setting','url' => ['user/profile']],
                                ['label' => 'Myads','url' => ['user/myads']],
                                ['label' => 'Wishlist','url' => ['user/wishlist']],
                                ['label' => 'Favourites Ads','url' => ['user/favads']],
                                ['label' => 'Archives Ads','url' => ['user/archivesad']],
                                ['label' => 'Message','url' => ['message/index']],
                                ['label' => 'Logout','url' => ['site/logout']],
                            ];
                            echo Html::ul($itemArr,['item' => function($item,$index) {
                                    $link = Html::a($item['label'],$item['url']);
                                    $activeLink = $this->context->route == $item['url'][0];
                                    if ($activeLink) {
                                        return "<li class='active'>{$link}</li>";
                                    } else {
                                        return "<li>{$link}</li>";
                                    }

                                }]);

                        ?>
                    </div>
                </div>

            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <?= $content ?>
            </div>

        </div>
    </section>
</div>

<!-- Navigation Menu End -->
<div class="footer-top">

</div>

<!-- Copyrights -->
<div class="copyrights">
    <div class="container">
        <div class="copyright-content">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p>&copy; Copyright <?php echo date('Y') ?> </p>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>


<!-- Back To Top -->
<a href="#0" class="cd-top">Top</a>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
