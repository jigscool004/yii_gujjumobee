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
<?= $content ?>
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
