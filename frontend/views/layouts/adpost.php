<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

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
<?php $this->beginBody();


?>
<div class="colored-header">
    <?php echo $this->render('_header')?>
    <!-- menu end -->
</div>

<div class="main-content-area clearfix">
    <section class="custom-padding-3 gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                    <div class="post-ad-form "><?= $content ?></div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-12">
                    <!-- Sidebar Widgets -->
                    <div class="blog-sidebar">
                        <!-- Categories -->
                        <div class="widget">
                            <div class="widget-heading">
                                <h4 class="panel-title"><a>Saftey Tips </a></h4>
                            </div>
                            <div class="widget-content">
                                <p class="lead">Posting an ad on <a href="#">AdForest.com</a> is free! However, all ads must follow our rules:</p>
                                <ol>
                                    <li>Make sure you post in the correct category.</li>
                                    <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                                    <li>Do not upload pictures with watermarks.</li>
                                    <li>Do not post ads containing multiple items unless it's a package deal.</li>
                                    <li>Do not put your email or phone numbers in the title or description.</li>
                                    <li>Make sure you post in the correct category.</li>
                                    <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                                    <li>Do not upload pictures with watermarks.</li>
                                    <li>Do not post ads containing multiple items unless it's a package deal.</li>
                                </ol>
                            </div>
                        </div>
                        <!-- Latest News -->
                    </div>
                    <!-- Sidebar Widgets End -->
                </div>
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
