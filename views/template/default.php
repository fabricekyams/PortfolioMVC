<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>my Portfolio</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=WEBROOT?>web/css/portfolio.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
	
		<div class="container-fluid "><div class="navbar-header">
	          <a href="#" class="navbar-brand">MY PORTFOLIO</a>
	        </div>
		<div class="collapse navbar-collapse container">
		<ul class="nav navbar-nav">
		<li><a href="<?=WEBROOT?>">About me</a></li>
		<li><a href="<?=WEBROOT?>projects/">Portfolio</a></li>
		</ul>
		</div>
		</div>
	</nav>
		<div class="container">
		
			<?= $renderContent ?>
		
		</div>
	
	<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<?php if (isset($script)):
	echo $script;
	endif;?>
</body>
</html>
