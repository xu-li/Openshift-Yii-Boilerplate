<?php
// set environment
require_once(dirname(__FILE__) . '/../misc/extensions/yii-environment/Environment.php');
if (empty(getenv('OPENSHIFT_APP_UUID')))
{
  $env = new Environment();
}
else
{
  $env = new Environment('PRODUCTION');
}


// set debug and trace level
defined('YII_DEBUG') or define('YII_DEBUG', $env->yiiDebug);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', $env->yiiTraceLevel);

// run Yii app
require_once($env->yiiPath);
$env->runYiiStatics(); // like Yii::setPathOfAlias()
Yii::createWebApplication($env->configWeb)->run();
