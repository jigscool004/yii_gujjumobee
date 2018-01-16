<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Dropdown;
?>
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo Url::to('/admin/', true); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" data-toggle="dropdown"
                       class="dropdown-toggle">Admin<?php echo Yii::$app->session->get('username') ?> <b
                                class="caret"></b></a>
                    <?php
                    echo Dropdown::widget([
                        'items' => [
                          //  ['label' => 'Dashboard', 'url' => Url::to('user/index', true)],
                            ['label' => 'Profile', 'url' => Url::to('user/profile', true)],
                            ['label' => 'Logout', 'url' => Url::to('admin/site/logout', true)],
                        ],
                    ]);
                    ?>
                </li>
            </ul>
        </div>
    </nav>
</header>