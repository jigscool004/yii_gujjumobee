<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#', 'class' => 'active'];
?>
<div class="row error-page">
    <!-- Middle Content Area -->
    <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="error-container">

            <div class="error-info"><h1><?= Html::encode($this->title) ?></h1>

                <div class="alert alert-danger">
                    <?= nl2br(Html::encode($message)) ?>
                </div>

                <p>
                    The above error occurred while the Web server was processing your request.
                </p>
                <p>
                    Please contact us if you think this is a server error. Thank you.
                </p>

            </div>
        </div>
    </div>

    <!-- Middle Content Area  End -->
</div>
<div class="error-container">


</div>
