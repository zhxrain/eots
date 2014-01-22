<h2><?php echo 'Update User'; ?></h2>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'user-form',
  'enableClientValidation'=>true,
  'clientOptions'=>array(
    'validateOnSubmit'=>true,
  )
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="row">
  <?php echo $form->labelEx($model, 'Username'); ?>
  <?php echo $form->textField($model, 'username', array('readonly'=>true)); ?>
</div>

<div class="row">
  <?php echo $form->labelEx($model, 'Password'); ?>
  <?php echo $form->passwordField($model, 'password'); ?>
</div>

<div class="row">
  <?php echo $form->labelEx($model, 'Password again'); ?>
  <?php echo $form->passwordField($model, 'repeatpassword'); ?>
</div>

<div class="row">
  <?php echo $form->labelEx($model, 'Email'); ?>
  <?php echo $form->textField($model, 'email'); ?>
</div>

<div class="row buttons">
  <?php echo CHtml::submitButton('Submit'); ?>
  <?php echo CHtml::button('Cancel',array('submit'=>array('account/index'))); ?>
</div>

</div>


<?php $this->endWidget(); ?>
