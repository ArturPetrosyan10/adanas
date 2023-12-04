<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class NewAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
  
    public $depends = [

    ];
    public $js = [
        
    ];
        public $css = [
        '/web/site/fonts/icons/style.css?v3',
        '/web/site/css/style.css?v3',
        '/web/site/css/ion.rangeSlider.min.css?v3',
        '/web/site/css/video-js.css?v3',
        "/web/css/new/site.css",
    ];  
}