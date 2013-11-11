<?php

/**
 * This is the model class for table "menu_item".
 *
 * The followings are the available columns in table 'menu_item':
 * @property integer $id
 * @property integer $root
 * @property integer $lft
 * @property integer $rgt
 * @property integer $level
 * @property string  $title
 * @property string  $uri
 */
class MenuItem extends CActiveRecord
{
  public $id;
  public $root;
  public $lft;
  public $rgt;
  public $level;
  public $title;
  public $uri;
  /**
   * @return string the associated database table name
   */
  public function tableName()
  {
    return 'menu_item';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules()
  {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('title', 'required'),
      // array('lft, rgt, level', 'required'),
      // array('root, lft, rgt, level', 'numerical', 'integerOnly'=>true),
      // The following rule is used by search().
      // @todo Please remove those attributes that should not be searched.
      // array('id, root, lft, rgt, level', 'safe', 'on'=>'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations()
  {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels()
  {
    return array(
      'id' => 'ID',
      'root' => 'Root',
      'lft' => 'Lft',
      'rgt' => 'Rgt',
      'level' => 'Level',
      'title' => 'Title',
      'uri' => 'Uri',
    );
  }

  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return MenuItem the static model class
   */
  public static function model($className=__CLASS__)
  {
    return parent::model($className);
  }

  public function behaviors()
  {
    return array(
      'NestedSetBehavior'=>array(
        'class'=>'application.vendor.yiiext.nested-set-behavior.NestedSetBehavior',
        'hasManyRoots'=>true, 
        'rootAttribute'=>'root',
        'leftAttribute'=>'lft',
        'rightAttribute'=>'rgt',
        'levelAttribute'=>'level',
      )
    );
  }
}
