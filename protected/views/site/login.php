<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Paper Stack</title>
</head>
<body>
<div class="container">
  <section id="content">
    <form action="/index.php?r=site/login" method="post">
      <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
          'validateOnSubmit'=>true,
        ),
      )); ?>
      <h1>Login Form</h1>
      <div id="login-error">
      <?php echo $form->error($model,'password'); ?>
      </div>
      <div>
        <input type="text" name="username" placeholder="用户名" required="" id="username" />
      </div>
      <div>
        <input type="password" name="password" placeholder="口令" required="" id="password" />
      </div>
      <div id="rememberMe">
        <input type="checkbox" name="rememberMe" value=1/>记住我?
      </div>
      <div>
        <input type="submit" value="登陆" />
        <!--a href="#">Lost your password?</a-->
      </div>
      <?php $this->endWidget(); ?>
    </form><!--Log form -->
  </section><!-- content -->
</div><!-- container -->
</body>
</html>
