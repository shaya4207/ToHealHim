<?php
	$file = $_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);
	$root = dirname(__FILE__);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Untitled Document</title>
		<link rel="stylesheet" type="text/css" href="http://<?php echo $file?>/_ext/default.css" />
		<link rel="stylesheet" type="text/css" href="http://<?php echo $file?>/fonts/style.css" />
	</head>
	<body>
		<div class="header">
			<div class="head_links_div">
				<span aria-hidden="true" class="head_links icon-facebook"></span>
				<span aria-hidden="true" class="head_links icon-twitter"></span>
				<span aria-hidden="true" class="head_links icon-google-plus"></span>
				<span aria-hidden="true" class="head_links icon-feed"></span>
				<div class="clear"></div>
			</div>
		</div>
		<div class="main_wrapper">
			<div class="main_nav">
				<ul>
					<li><a href="" class="active">Link</a></li>
					<li><a href="">Link</a></li>
					<li><a href="">Link</a></li>
					<li><a href="">Link</a></li>
					<li><a href="">Link</a></li>
				</ul>
			</div>
			<div class="content">
				<div class="main_content">
					test
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</body>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script type="text/javascript" src="http://<?php echo $file?>/_ext/default.js"></script>
</html>