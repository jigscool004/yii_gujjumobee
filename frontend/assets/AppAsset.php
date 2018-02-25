<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'css/bootstrap.css',
        'css/font-awesome.css',
        'css/flaticon.css',
        'css/forest-menu.css',
        'css/colors/defualt.css',
        'css/skins/minimal/minimal.css',
    ];
    
    public $js = [
        'js/bootbox.min.js',
    ];
    
    
    public function init() {
        if (\Yii::$app->user->isGuest == true) {
            $this->js[] = 'js/bootstrap.min.js';
        } 
        //parent::init();
    }
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
