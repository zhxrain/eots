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
      <li><a href="#">系统配置</a>
          <ul>
              <li><a href="#">状态</a></li>
              <li><a href="#">快捷配置</a></li>
              <li><a href="#">配置</a></li>
              <li uri="account/index"><a href="#">管理员设置</a></li>
              <li><a href="#">维护</a></li>
              <li uri="Role/index"><a href="#">权限管理</a></li>
          </ul>
      </li>
      <li><a href="#">网络管理</a>
          <ul>
              <li><a href="#">网络接口</a></li>
              <li><a href="#">高可用性</a></li>
          </ul>
      </li>
      <li><a href="#">访问控制</a>
          <ul>
              <li><a href="#">策略</a></li>
              <li><a href="#">地址</a></li>
              <li><a href="#">服务</a></li>
              <li><a href="#">时间</a></li>
              <li><a href="#">安全选项</a></li>
          </ul>
      </li>
      <li><a href="#">应用防护</a>
          <ul>
              <li><a href="#">协议控制</a>
                <ul>
                    <li><a href="#">协议控制总策略</a></li>
                    <li><a href="#">协议控制策略</a></li>
                    <li><a href="#">协议控制内容</a></li>
                </ul>
              </li>
              <li><a href="#">入侵防护</a></li>
              <li><a href="#">Web应用防护</a></li>
          </ul>
      </li>
      <li><a href="#">会话管理</a>
          <ul>
              <li><a href="#">会话控制</a></li>
              <li><a href="#">会话统计</a></li>
              <li><a href="#">会话状态</a></li>
          </ul>
      </li>
      <li><a href="#">协议封装</a>
          <ul>
              <li><a href="#">封闭策略</a></li>
          </ul>
      </li>
      <li><a href="#">统一认证</a>
          <ul>
              <li><a href="#">角色管理</a></li>
          </ul>
      </li>
      <li><a href="#">状态监控</a>
          <ul>
              <li><a href="#">状态信息</a></li>
          </ul>
      </li>
      <li><a href="#">日志</a>
          <ul>
              <li><a href="#">日志配置</a></li>
              <li><a href="#">日志访问</a></li>
          </ul>
      </li>
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
