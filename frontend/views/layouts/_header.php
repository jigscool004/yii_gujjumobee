<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Dropdown;
?>
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
                    <?php

                    if (Yii::$app->user->isGuest == true): ?>
                        <ul class="listnone">
                            <li><?php echo Html::a('<i aria-hidden="true" class="fa fa-sign-in"></i> Login', ['site/login']) ?></li>
                            <li><?php echo Html::a('<i aria-hidden="true" class="fa fa-unlock"></i> Signup', ['site/signup']) ?></li>

                        </ul>
                    <?php else : ?>
                        <ul class="listnone">
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown"
                                   class="dropdown-toggle"><?php echo Yii::$app->session->get('username') ?> <b
                                            class="caret"></b></a>
                                <?php
                                echo Dropdown::widget([
                                    'items' => [
                                        ['label' => 'Dashboard', 'url' => Url::to(['user/index'], true)],
                                        ['label' => 'Profile', 'url' => Url::to(['user/profile'], true)],
                                        ['label' => 'Logout', 'url' => Url::to(['site/logout'], true)],
                                    ],
                                ]);
                                ?>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<nav id="menu-1" class="mega-menu">
    <section class="menu-list-items">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <ul class="menu-logo pull-left">
                        <li>
                            <a href="<?php echo Url::to(['/'], true); ?>">
                                <?php echo Html::img('@web/images/logo.png', ['alt' => 'GujjuMobi']) ?>
                            </a>
                        </li>
                    </ul>
                    <ul class="menu-search-bar pull-right">
                        <li>
                            <a href="<?php echo  Url::to('adpost/create', true); ?>" class="btn btn-light"><i
                                        class="fa fa-plus" aria-hidden="true"></i> Post Free Ad</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</nav>