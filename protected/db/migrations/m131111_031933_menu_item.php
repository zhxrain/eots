<?php

Yii::import('application.models.*');
Yii::import('application.models.base.*');

class m131111_031933_menu_item extends EDbMigration
{
  public function safeUp()
  {
    $this->createTable('menu_item', array(
      'id' => 'pk',
      'lft' => 'integer NOT NULL',
      'rgt' => 'integer NOT NULL',
      'level' => 'integer NOT NULL',
      'title' => 'string NOT NULL',
      'uri' => 'string DEFAULT NULL'
    ));
    $category1=new MenuItem;
    $category1->title='Ford';
    $category2=new MenuItem;
    $category2->title='Mercedes';
    $category3=new MenuItem;
    $category3->title='Audi';
    $root=MenuRoot::model()->findByPk(1);
    $category1->appendTo($root);
    $category1->saveNode(false);
    // $category1=MenuItem::model()->findByPk(2);
    $category2->insertAfter($category1);
    $category3->insertBefore($category1);
    $category2->saveNode(false);
    $category3->saveNode(false);
  }

  public function safeDown()
  {
    $this->dropTable('menu_item');
  }
}
