<?php


ini_set('max_input_vars', 60000);
ini_set('max_execution_time', '12000');
ini_set('display_errors',0);
ini_set('error_reporting', 0);
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';


$config = require __DIR__ . '/config/web.php';

(new yii\web\Application($config))->run();
