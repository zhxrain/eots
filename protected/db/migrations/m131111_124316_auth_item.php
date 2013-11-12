<?php

class m131111_124316_auth_item extends EDbMigration
{
  public function safeUp()
  {
    $this->createTable('auth_item', array(
      'name' => 'varchar(20) NOT NULL PRIMARY KEY',
      'type' => 'integer', 
      'description' => 'varchar(30) DEFAULT ""', 
      'bizrule' => 'varchar(100) DEFAULT NULL', 
      'data' => 'varchar(100) DEFAULT NULL'
    ));
    $this->insert('auth_item', array('name'=>'Administrators', 'type'=>2));
    $this->insert('auth_item', array('name'=>'showRoles', 'type'=>0, 'description'=>'show roles'));
    $this->insert('auth_item', array('name'=>'showUsers', 'type'=>0, 'description'=>'show users'));
  }

  public function safeDown()
  {
    $this->dropTable('auth_item');
  }
}
