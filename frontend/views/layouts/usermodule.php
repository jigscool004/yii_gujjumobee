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
    <?php echo $this->render('_header')?>
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
                'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all link
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
