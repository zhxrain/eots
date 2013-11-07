<h2><?php echo 'Create User'; ?></h2>

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
  <?php echo $form->labelEx($model, '用户名'); ?>
  <?php echo $form->textField($model, 'username'); ?>
</div>

<div class="row">
  <?php echo $form->labelEx($model, '密码'); ?>
  <?php echo $form->passwordField($model, 'password'); ?>
</div>

<div class="row">
  <?php echo $form->labelEx($model, '再输一次密码'); ?>
  <?php echo $form->passwordField($model, 'repeatpassword'); ?>
</div>

<div class="row">
  <?php echo $form->labelEx($model, '邮箱'); ?>
  <?php echo $form->textField($model, 'email'); ?>
</div>

<div class="row buttons">
  <?php echo CHtml::submitButton('提交'); ?>
</div>
<?php $this->endWidget(); ?>
