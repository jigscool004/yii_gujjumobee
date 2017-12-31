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
    <!-- Top Bar -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Header Top Left -->
                <div class="header-top-left col-md-8 col-sm-6 col-xs-12 hidden-xs">
                    <ul class="listnone">
                        <li><?php echo Html::a('<i aria-hidden="true" class="fa fa-heart-o"></i> About', ['site/about']) ?></li>
                        <li><?php echo Html::a('<i aria-hidden="true" class="fa fa-folder-open-o"></i> FAQs', ['site/faq']) ?></li>
                    </ul>
                </div>
                <!-- Header Top Right Social -->
                <div class="header-right col-md-4 col-sm-6 col-xs-12 ">
                    <div class="pull-right">
                        <ul class="listnone">
                            <li><?php echo Html::a('<i aria-hidden="true" class="fa fa-sign-in"></i> Login', ['site/login']) ?></li>
                            <li><?php echo Html::a('<i aria-hidden="true" class="fa fa-unlock"></i> Signup', ['site/signup']) ?></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->
    <!-- Navigation Menu -->
    <div class="clearfix"></div>
    <!-- menu start -->
    <nav id="menu-1" class="mega-menu">
        <!-- menu list items container -->
        <section class="menu-list-items">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <ul class="menu-logo pull-left">
                            <li>
                                <a href="<?php echo Yii::$app->homeUrl; ?>">
                                    <?php echo Html::img('@web/images/logo.png', ['alt' => 'GujjuMobi']) ?>
                                </a>
                            </li>
                        </ul>
                        <ul class="menu-search-bar pull-right">
                            <li>
                                <a href="<?php #echo site_url('adpost/index') ?>" class="btn btn-light"><i
                                            class="fa fa-plus" aria-hidden="true"></i> Post Free Ad</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </nav>
    <!-- menu end -->
</div>
<div class="small-breadcrumb">
    <div class="container">
        <div class=" breadcrumb-link">
            <?= Breadcrumbs::widget([
                'itemTemplate' => "<li>{link}  </li>\n", // template for all link
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'options' => ['class' => '']
            ]) ?>

        </div>
    </div>
</div>
<div class="main-content-area clearfix">
    <section class="custom-padding-3 gray">
        <div class="container">
            <?= $content ?>
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
