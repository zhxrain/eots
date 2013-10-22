<h2><?php echo 'View Role'; ?></h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
  'dataProvider' => $dataProvider,
  'columns' => array(
    'name',
    array(
      'class' => 'CButtonColumn'
    )
  )
));
?>
