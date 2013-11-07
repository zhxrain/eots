<h2><?php echo 'View User'; ?></h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
  'dataProvider' => $dataProvider,
  'columns' => array(
    'id',
    'username',
    'email',
    array(
      'class' => 'CButtonColumn'
    )
  )
));
?>

<?php $this->widget('zii.widgets.jui.CJuiButton', array(
  'buttonType'=>'link',
  'name'=>'createUser',
  'caption'=>'添加用户',
  //'options'=>array('icons'=>'js:{secondary:"ui-icon-extlink"}'),
  'url'=>array('account/create'),
));
?>

