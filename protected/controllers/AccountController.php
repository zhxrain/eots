<?php

class AccountController extends Controller
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
    $dataProvider =new CActiveDataProvider('User', array(
      'pagination'=>array(
        'pageSize'=>10,
        'pageVar'=>'page',
      ),
      'sort'=>array(
        'defaultOrder'=>'id',
      ),
    ));
    $this->render('index',array(
      'dataProvider'=>$dataProvider,
    ));
  }
}

?>
