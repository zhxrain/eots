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
                $this->layout = 'page';
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
    if(Yii::app()->user->checkAccess('showUsers')){
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
      return;
    }
    $this->render("/site/authError");
  }

  public function actionView($id)
  {
    $this->layout = 'page';
    $user=User::model()->findByPk($id);
    $this->render('detail',array('model'=>$user));
  }

  public function actionDelete()
  {
    $id = $_GET['id'];
    $user=User::model()->findByPk($id);
    $user->delete();
  }

  public function actionCreate()
  {
    $this->layout = 'page';
    $user= new User('create');
    if(isset($_POST['User']))
    {
      $user->attributes = $_POST['User'];
      if($user->validate() && $user->save())
        $this->redirect(array("/account/index"));
    }
    $this->render("/account/create", array('model'=>$user));
  }

  public function actionUpdate($id)
  {
    $this->layout = 'page';
    $user=User::model()->findByPk($id);
    if(isset($_POST['User']))
    {
      $user->attributes = $_POST['User'];
      if($user->validate() && $user->save())
        $this->redirect(array("/account/index"));
    }
    $user->repeatpassword = $user->password;
    $this->render("/account/update", array('model'=>$user));
  }
}

?>
