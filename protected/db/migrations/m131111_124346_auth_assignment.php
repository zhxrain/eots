<?php

class m131111_124346_auth_assignment extends EDbMigration
{
  public function safeUp()
  {
    $this->createTable('auth_assignment', array(
      'id' => 'pk',
      'userid' => 'integer NOT NULL', 
      'itemname' => 'varchar(20) NOT NULL', 
      'bizrule' => 'varchar(100) DEFAULT NULL', 
      'data' => 'varchar(100) DEFAULT NULL'
    ));
    $this->insert('auth_assignment', array('userid'=>'admin', 'itemname'=>'Administrators'));
    $this->insert('auth_assignment', array('userid'=>'user0', 'itemname'=>'Guest'));
  }

  public function safeDown()
  {
    $this->dropTable('auth_assignment');
  }
}
