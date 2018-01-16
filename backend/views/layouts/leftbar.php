<?php
use kartik\sidenav\SideNav;
use yii\helpers\Url;

//http://demos.krajee.com/widget-details/sidenav#sidenav-heading
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <?php
        $item = Yii::$app->controller->id;

        $itemsArr = [
            ['label' => '<span>Home</span>   ', 'icon' => 'home', 'url' => Url::to('/admin/', true), 'active' => ($item == 'home'),],
            ['label' => '<span>Global Setting</span>', 'submenuTemplate' => "\n<ul class='treeview-menu menu-open'>\n{items}\n</ul>\n", 'icon' => 'tags', 'active' => (in_array($item,['city','area','mobile-category','mobile-model'])), 'items' => [
                ['label' => '<i class="fa fa-circle-o"></i>City ', 'url' => Url::to('/admin/city',true), 'active' => ($item == 'city')],
                ['label' => '<i class="fa fa-circle-o"></i> Area', 'url' => Url::to('/admin/area',true), 'active' => ($item == 'area')],
                ['label' => '<i class="fa fa-circle-o"></i> Mobile Category', 'url' => Url::to('/admin/mobile-category',true), 'active' => ($item == 'mobile-category')],
                ['label' => '<i class="fa fa-circle-o"></i> Mobile Model', 'url' => Url::to('/admin/mobile-model',true), 'active' => ($item == 'mobile-model')],

            ]],
            ['label' => '<span>Profile</span>', 'icon' => 'user', 'url' => Url::to('/site/profile',true),],
        ];

        $type = '';
        $heading = 'MAIN NAVIGATION';
        echo SideNav::widget([
            //  'type' => 'sidebar-menu',

            'encodeLabels' => false,
            'heading' => false,
            'options' => array('class' => 'sidebar-menu'),
            'itemOptions' => ['class' => 'treeview'],
            'containerOptions' => ['class' => ''],
            'items' => $itemsArr,
        ]);

        ?>

    </section>
    <!-- /.sidebar -->
</aside>