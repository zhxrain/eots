<?php class m131111_124320_auth_item_child extends EDbMigration
{
  public function safeUp()
  {
    $this->createTable('auth_item_child', array(
      'id' => 'pk',
      'parent' => 'varchar(20) NOT NULL', 
      'child' => 'varchar(20) NOT NULL'
    ));
    $this->insert('auth_item_child', array('parent'=>'Administrators', 'child'=>'showRoles'));
    $this->insert('auth_item_child', array('parent'=>'Administrators', 'child'=>'showUsers'));
  }

  public function safeDown()
  {
    $this->dropTable('auth_item_child');
  }
}
