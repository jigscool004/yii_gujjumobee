<?php
/**
 * Created by PhpStorm.
 * User: Jigar Kumar
 * Date: 1/10/2018
 * Time: 12:02 AM
 */

namespace backend\assets;

use yii\web\AssetBundle;

class LoginAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/blue.css',
        'css/AdminLTE.min.css',
        'css/ionicons.min.css','css/ionicons.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}