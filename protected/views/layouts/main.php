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
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jq.layout/layout-default-latest.css" media="screen" />

        <?php
          $cs=Yii::app()->clientScript;
          $cs->registerCoreScript('jquery');
          // $cs->registerCoreScript('jquery.ui');
          $cs->registerScriptFile(Yii::app()->baseUrl . '/js/navgoco/jquery.cookie.min.js');
          $cs->registerScriptFile(Yii::app()->baseUrl . '/js/navgoco/jquery.navgoco.min.js');
          $cs->registerScriptFile(Yii::app()->baseUrl . '/js/jq.layout/jquery.layout-latest.min.js');
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
                  $("#frame").attr("src", "index.php?r=" + uri);
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
            $('#container').layout({
                closable: true
              , resizable: true
              , north__resizable: false
              , north__spacing_open: 0
              , south__resizable: false
              , south__spacing_open: 0
            });
          });
        </script>
</head>

<body>

<div id="container"  class="">
  <div class="pane ui-layout-north">Main Toolbar
    <div style="text-align:right;">
      <?php if(!Yii::app()->user->isGuest) { ?>
      <?php echo Yii::app()->user->name; ?>(<a href="index.php?r=site/logout">注销</a>)
      <?php } ?>
    </div>
  </div>
  <div class="pane ui-layout-west" id="nav-sidebar">
    <ul class="nav">
    <?php 
      $level=1;
      // FIXME(ZOwl): load menu depends on difference role.
      $menu_items=MenuItem::model()->findAll(array('order'=>'id'));
       
      foreach($menu_items as $n=>$item)
      {
        if($item->level==$level)
        {
          echo CHtml::closeTag('li')."\n";
        }
        else if($item->level>$level)
        {
          echo CHtml::openTag('ul')."\n";
        }
        else
        {
          echo CHtml::closeTag('li')."\n";

          for($i=$level-$item->level;$i;$i--)
          {
            echo CHtml::closeTag('ul')."\n";
            echo CHtml::closeTag('li')."\n";
          }
        }

        echo CHtml::openTag('li', array('uri'=>$item->uri));
        echo CHtml::openTag('a', array('href'=>'#'));
        echo CHtml::encode($item->title);
        echo CHtml::closeTag('a')."\n";
        $level=$item->level;
      }
       
      for($i=$level;$i;$i--)
      {
        echo CHtml::closeTag('li')."\n";
        echo CHtml::closeTag('ul')."\n";
      }
    ?>
    </ul>
  </div>
  <div class="pane ui-layout-center">
    <div class="container" id="page">
      <iframe id="frame" src="index.php?r=site/dashboard" width="100%" height="100%"></iframe>
    </div>
  </div>
  <div class="pane ui-layout-south">
    <div id="footer">
      Copyright &copy; <?php echo date('Y'); ?> by My Company. All Rights Reserved.
    </div><!-- footer -->
  </div>
</div><!-- page -->

</body>
</html>
