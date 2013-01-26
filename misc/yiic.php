<?php
// set environment
require_once(dirname(__FILE__) . '/extensions/yii-environment/Environment.php');
$env = new Environment(isset($_ENV['OPENSHIFT_APP_UUID']) ? 'PRODUCTION' : NULL);

// set debug and trace level
defined('YII_DEBUG') or define('YII_DEBUG', $env->yiiDebug);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', $env->yiiTraceLevel);

// run Yii app
require_once($env->yiicPath);
