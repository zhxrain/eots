<?php

require_once(dirname(__FILE__).'/../vendor/yiiext/migrate-command/EMigrateCommand.php');

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
  'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
  'name'=>'My Console Application',

  // preloading 'log' component
  'preload'=>array('log'),

  'import'=>array(
    'application.models.*',
    'application.components.*',
    'application.modules.user.models.*', 
  ),
  'modules'=>array(
    'user'=>array(
      'debug'=>true
    )
  ),

  // application components
  'components'=>array(
    'db'=>array(
      'connectionString' => 'sqlite:'.dirname(__FILE__).'/../db/eots.db',
      'tablePrefix' => '',
    ),
    'authManager'=>array(
      'class' => 'CDbAuthManager',
      'connectionID' => 'db',
      'itemTable' => 'auth_item',
      'itemChildTable' => 'auth_item_child',
      'assignmentTable' => 'auth_assignment'
    ),
    'log'=>array(
      'class'=>'CLogRouter',
      'routes'=>array(
        array(
          'class'=>'CFileLogRoute',
          'levels'=>'error, warning',
        ),
      ),
    ),
  ),
  'commandMap' => array(
    'migrate' => array(
      // alias of the path where you extracted the zip file
      'class' => 'yiiext.commands.migrate.EMigrateCommand',
      // this is the path where you want your core application migrations to be created
      'migrationPath' => 'application.db.migrations',
      // the name of the table created in your database to save versioning information
      'migrationTable' => 'tbl_migration',
      // the application migrations are in a pseudo-module called "core" by default
      'applicationModuleName' => 'core',
      // define all available modules (if you do not set this, modules will be set from yii app config)
      'modulePaths' => array(
      ),
      // you can customize the modules migrations subdirectory which is used when you are using yii module config
      'migrationSubPath' => 'migrations',
      // here you can configure which modules should be active, you can disable a module by adding its name to this array
      'disabledModules' => array(
      ),
      // the name of the application component that should be used to connect to the database
      'connectionID'=>'db',
      // alias of the template file used to create new migrations
      // 'templateFile'=>'application.db.migration_template',
    ),
    'database' => array(
      'class' => 'applicatoin.vendor.schmunk42.database-command.EDatabaseCommand',
    ),
  ),
);
