<?php $this->widget('zii.widgets.CDetailView', array(
  'data'=>$model,
  'attributes'=>array(
    'username',
    'email',
    //array(
      //'name'=>'Employee',
      //'value'=>$model->employee->FirstName,
    //),
  ),
));
?>
<div class="row buttons">
  <?php echo CHtml::button('返回',array('submit'=>array('account/index'))); ?>
</div>
