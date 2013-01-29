<?php

/**
 * Production configuration
 * Usage:
 * - Online website
 * - Production DB
 * - Standard production error pages (404, 500, etc.)
 */

return array(

	// Set yiiPath (relative to Environment.php)
	//'yiiPath' => dirname(__FILE__) . '/../../../yii/framework/yii.php',
	//'yiicPath' => dirname(__FILE__) . '/../../../yii/framework/yiic.php',
	//'yiitPath' => dirname(__FILE__) . '/../../../yii/framework/yiit.php',

	// Set YII_DEBUG and YII_TRACE_LEVEL flags
	'yiiDebug' => false,
	'yiiTraceLevel' => 0,

	// Static function Yii::setPathOfAlias()
	'yiiSetPathOfAlias' => array(
		// uncomment the following to define a path alias
		//'local' => 'path/to/local-folder'
	),

	// This is the specific Web application configuration for this mode.
	// Supplied config elements will be merged into the main config array.
	'configWeb' => array(

    'runtimePath' => getenv('OPENSHIFT_PHP_LOG_DIR'),

		// Application components
		'components' => array(

//			'cache' => array( //needed for schema caching
//				'class' => 'system.caching.CFileCache',
//			),

			// Database
			'db' => array(
				'connectionString' => sprintf('mysql:host=%s;port=%d;dbname=%s', getenv('OPENSHIFT_MYSQL_DB_HOST'), getenv('OPENSHIFT_MYSQL_DB_PORT'), getenv('OPENSHIFT_APP_NAME')),
				'username' => getenv('OPENSHIFT_MYSQL_DB_USERNAME'),
				'password' => getenv('OPENSHIFT_MYSQL_DB_PASSWORD')
				//'schemaCachingDuration' => 3600,
			),

			// Application Log
			'log' => array(
				'class' => 'CLogRouter',
				'routes' => array(
					// Save log messages on file
					array(
						'class' => 'CFileLogRoute',
						'levels' => 'error, warning, info'
					),
					// Send errors via email to the system admin
          /*
					array(
						'class' => 'CEmailLogRoute',
						'levels' => 'error, warning',
						'emails' => 'webadmin@example.com',
					),
          */
				),
			),

		),

	),

	// This is the Console application configuration. Any writable
	// CConsoleApplication properties can be configured here.
    // Leave array empty if not used.
    // Use value 'inherit' to copy from generated configWeb.
	'configConsole' => array(

    'runtimePath' => getenv('OPENSHIFT_PHP_LOG_DIR'),

		// Application components
		'components' => array(

			// Application Log
			'log' => 'inherit',

		),

	),

);
