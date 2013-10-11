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
  }
}

?>
