<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Adpost */

$this->title = 'Post Ad';
//$this->params['breadcrumbs'][] = ['label' => 'Adposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#' ];;
?>
<div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
    <div class="post-ad-form ">
        <div class="heading-panel">
            <h3 class="main-title text-left">
                Post Your Ad
            </h3>
        </div>


        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
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


