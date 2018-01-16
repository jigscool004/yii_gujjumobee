<?php
/**
 * Created by PhpStorm.
 * User: Jigar Kumar
 * Date: 1/10/2018
 * Time: 12:08 AM
 */

use backend\assets\LoginAsset;
use yii\helpers\Html;

LoginAsset::register($this);

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

<body class="hold-transition login-page">
<?= $content ?>

<!--</div>-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

