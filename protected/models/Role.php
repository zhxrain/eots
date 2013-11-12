<?php
class Role extends CActiveRecord
{
  public static $TYPES = array('Operation','Task','Role');

  public function getDbConnection() {
    return Yii::app()->authManager->db;
  }

  public static function model($className=__CLASS__)
  {
    return parent::model($className);
  }

  public function tableName()
  {
    return Yii::app()->authManager->itemTable;
  }

  // public function display()
  // {
  //   return 
  // }
}
?>
