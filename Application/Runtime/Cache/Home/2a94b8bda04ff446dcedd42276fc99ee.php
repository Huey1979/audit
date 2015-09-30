<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo ($siteInfo['title']); ?></title>
		<link rel="stylesheet" type="text/css" href="/static/css/style.css" />
<?php if(isset($cssFiles)): if(is_array($cssFiles)): $i = 0; $__LIST__ = $cssFiles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$file): $mod = ($i % 2 );++$i;?><link rel="stylesheet" type="text/css" href="/static/css/<?php echo ($file); ?>" /><?php endforeach; endif; else: echo "" ;endif; endif; ?>
		<script type="text/javacript" src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<?php if(isset($jssFiles)): if(is_array($jsFiles)): $i = 0; $__LIST__ = $jsFiles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$file): $mod = ($i % 2 );++$i;?><script type="text/javacript" src="/static/js/<?php echo ($file); ?>"></script><?php endforeach; endif; else: echo "" ;endif; endif; ?>
	</head>
	<body>
<div id="leftpart">
	<ul id="menu">
<?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
			<a href="javascript: void(0);"><?php echo ($menu['title']); ?></a>
			<ul>
<?php if(is_array($menu['submenu'])): $i = 0; $__LIST__ = $menu['submenu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$submenu): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($submenu['url']); ?>"><?php echo ($submenu['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	<div class="toggle show">
	</div>
</div>
<div id="middlepart">
	<iframe id="middle" name="middle" frameborder="0" scroll="auto"></iframe>
	<div class="toggle show">	
	</div>
</div>
<div id="rightpart">
	<iframe id="right" name="right" frameborder="0" scroll="auto"></iframe>
	<div class="toggle show">
	</div>
</div>
	</body>
</html>