<?php
/**
 * Created by PhpStorm.
 * User: Jigar Kumar
 * Date: 1/23/2018
 * Time: 11:34 PM
 */

namespace frontend\assets;
use yii\web\AssetBundle;


class AdpostAssest extends AssetBundle{
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
        'css/slider.css'
    ];
    public $js = [
       // 'js/bootstrap.min.js',
        'js/slide.js',
        'js/bootbox.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}