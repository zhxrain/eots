<?php

Yii::import('application.models.*');
Yii::import('application.models.base.*');

class m131111_030835_menu_root extends EDbMigration
{
  public function safeUp()
  {
    $this->createTable('menu_root', array(
      'id' => 'pk',
      'root' => 'integer DEFAULT NULL',
      'lft' => 'integer NOT NULL',
      'rgt' => 'integer NOT NULL',
      'level' => 'integer NOT NULL',
      'title' => 'string NOT NULL',
      'uri' => 'string DEFAULT NULL'
    ));
    $root=new MenuRoot;
    $root->title='Menu';
    $root->saveNode(false);
  }

  public function safeDown()
  {
    $this->dropTable('menu_root');
  }
}
