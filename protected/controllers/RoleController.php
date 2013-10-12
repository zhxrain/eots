<?php

class RoleController extends Controller
{
  /**
	 * Declares class-based actions.
	 */
	

  /**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
    //$auth=Yii::app()->authManager;
    //$role = $auth->createRole('gen');
    //$auth->createOperation('showRoles','show roles');
    //$role->addChild('showRoles');
    //$auth->assign('gen','admin');
    if(Yii::app()->user->checkAccess('showRoles')){
      $auth=Yii::app()->authManager;
      $op = $auth->getOperations();
      if(!isset($op['showRoles'])){
        $auth->createOperation('showRoles','show roles');
        $auth->save();
      }
      $criteria=new CDbCriteria;
      $criteria->addCondition("type=2"); 
      $dataProvider =new CActiveDataProvider('Role', array(
        'criteria'=>$criteria,
        'pagination'=>array(
          'pageSize'=>10,
          'pageVar'=>'page',
        ),
      ));
      $this->render('index',array(
        'dataProvider'=>$dataProvider,
      ));
      return;
    }
    $this->render("/site/authError");
  }
}

?>
