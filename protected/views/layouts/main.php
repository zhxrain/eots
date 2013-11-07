<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/navgoco/jquery.navgoco.css" media="screen" />

        <?php
          $cs=Yii::app()->clientScript;
          $cs->registerCoreScript('jquery');
          $cs->registerScriptFile(Yii::app()->baseUrl . '/js/navgoco/jquery.cookie.min.js');
          $cs->registerScriptFile(Yii::app()->baseUrl . '/js/navgoco/jquery.navgoco.min.js');
        ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <script type="text/javascript">
          $(document).ready(function() {
            $(".nav").navgoco({
              accordion: true,
              onClickBefore: function(e, submenu) {
                console.log('Clicked on '+ (submenu === false ? 'leaf' : 'branch') + ' `'+$(this).text()+'`');
              },
              onClickAfter: function(e, submenu) {
                e.preventDefault();
                $('.nav').find('li').removeClass('active');
                var li =  $(this).parent();
                var lis = li.parents('li');
                li.addClass('active');
                lis.addClass('active');

                var uri = li.attr('uri');
                if(uri)
                  $("#frame").attr("src", "/index.php?r=" + uri);
              },
              onToggleBefore: function(submenu, opening) {
                var idx = submenu.attr('data-index');
                var message = opening ? 'opening' : 'closing';
                console.log('I am ' + message + ' menu ' + idx + ' just after this.');
              },
              onToggleAfter: function(submenu, opened) {
                var idx = submenu.attr('data-index');
                var message = opened ? 'opened' : 'closed';
                console.log('I ' + message + ' menu ' + idx + ' just before this.');
              }
            });
          });
        </script>
</head>

<body>

<div>
  <div class="span-5">
    <div class="wrapper">
      <ul class="nav">
        <li><a href="#">系统配置</a>
            <ul>
                <li uri="site/dashboard"><a href="#">主面板</a></li>
                <li uri="account/index"><a href="#">用户管理</a></li>
                <li uri="Role/index"><a href="#">权限管理</a></li>
            </ul>
        </li>
        <li><a href="#">2. Menu2</a>
            <ul>
                <li><a href="#">2.1 Submenu</a></li>
                <li><a href="#">2.2 Submenu</a></li>
                <li><a href="#">2.3 Submenu</a></li>
                <li><a href="#">2.4 Submenu</a>
                  <ul>
                      <li><a href="#">2.4.1 Submenu</a></li>
                      <li><a href="#">2.4.2 Submenu</a></li>
                      <li><a href="#">2.4.3 Submenu</a></li>
                  </ul>
                </li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
  <div class="span-24 last">
    <div class="toolbar">
      <div style="text-align:right;">
        <?php if(!Yii::app()->user->isGuest) { ?>
        <?php echo Yii::app()->user->name; ?>(<a href="/index.php?r=site/logout">注销</a>)
        <?php } ?>
      </div>
    </div>
    <div class="container" id="page">
      <iframe id="frame" src="/index.php?r=site/dashboard" width="100%" height="680"></iframe>
    </div>
  </div>
  <div class="clear"></div>
  <div id="footer">
          Copyright &copy; <?php echo date('Y'); ?> by My Company. All Rights Reserved.
  </div><!-- footer -->
</div><!-- page -->

</body>
</html>
