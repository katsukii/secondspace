<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		<?php echo __('secondspace(α):'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<?php echo $this->Html->css('bootstrap.min'); ?>
	<style>
	body {
		padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
	}
	</style>
	<?php echo $this->Html->css('bootstrap-responsive.min'); ?>
	<?php echo $this->Html->css('style'); ?>

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	<!--
	<link rel="shortcut icon" href="/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
	-->
	<?php
	echo $this->fetch('meta');
	echo $this->fetch('css');
	?>
</head>
<body>

	<div class="navbar navbar-inverse navbar-fixed-top" style="margin-bottom:40px;">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<h1 style="padding:0;margin:0;line-height:20px;">
					<?php echo $this->Html->link('Secondspace(α)', array('controller' => 'top_pages', 'action' => 'index'), array('class' => 'brand')); ?>
				</h1>
				
				<div class="nav-collapse">
					<ul class="nav">
						<li class="active"><?php echo $this->Html->link('Home', array('controller' => 'top_pages', 'action' => 'index')); ?></li>
						<li><a href="#help">Help</a></li>
					</ul>
			        <!-- 右上ドロップダウンメニュー -->
			        <?php if($auth_user):?>
			        <ul class="nav pull-right">
			            <li class="dropdown">
			                <a href="" class="dropdown-toggle" data-toggle="dropdown">
			                <img width="20" height="20" src="">

			                <?php echo $auth_user['name']; ?>
			                <span class="caret"></span>
			                </a>
			                <ul class="dropdown-menu">
			                    <li><?php echo $this->Html->link('<i class="icon-cog"></i>プロフィール設定', array('controller' => 'users', 'action' => 'edit'), array('escape' => false)); ?></li>
			                    <li><?php echo $this->Html->link('<i class="icon-share-alt"></i>ログアウト', array('controller' => 'users', 'action' => 'logout'), array('escape' => false)); ?></li>
			                </ul>
			            </li>
			        </ul>
			        <?php endif; ?>					
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>

<div class="container">

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>

</div> <!-- /container -->

	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<?php echo $this->Html->script('bootstrap.min'); ?>
	<?php echo $this->fetch('script'); ?>

</body>
</html>
