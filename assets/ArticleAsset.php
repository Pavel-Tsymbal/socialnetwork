<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 02.10.18
 * Time: 15:53
 */

namespace app\assets;


use yii\web\AssetBundle;

class ArticleAsset extends AssetBundle
{
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',
        'js/article.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}