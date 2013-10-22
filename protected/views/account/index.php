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
