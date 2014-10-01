<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>my Portfolio</title>
	<link href="<?=WEBROOT?>web/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=WEBROOT?>web/css/portfolio.css" rel="stylesheet">
</head>
<body>
	 <nav class="navbar navbar-inverse navbar-static-top" role="navigation">

	<div class="container-fluid">
	<div class="navbar-header">
          <a href="#" class="navbar-brand">Admin</a>
        </div>
	<div class="collapse navbar-collapse container">
	<ul class="nav navbar-nav">
	<li class=""><a href="<?=WEBROOT?>private/">my profile</a></li>
	<li class=""><a href="<?=WEBROOT?>private/projects">Projets</a></li>
	</ul>
	<a href=" <?=WEBROOT?>private/user/logout"><button class="btn btn-danger navbar-btn navbar-right" type="button">deconnexion</button></a>
	
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
