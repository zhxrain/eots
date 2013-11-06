<?php
class RequireLogin extends CBehavior
{
  public function attach($owner)
  {
    $owner->attachEventHandler('onBeginRequest', array($this, 'handleBeginRequest'));
  }

  public function handleBeginRequest($event)
  {
    if (Yii::app()->user->isGuest) {
      if(!empty($_GET['r']) && in_array($_GET['r'],array('site/login'))) {
        return;
      }
      Yii::app()->user->loginRequired();
    }
  }
}
?>
