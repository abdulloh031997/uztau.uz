<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/lightGallery.css',
        'css/mdb.min.css',
        'css/owl.carousel.css',
        'css/mas.css',

    ];
    public $js = [
        'js/mdb.min.js',
        'js/lightGallery.js',
        'js/owl.carousel.min.js',
        'js/style.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}