<?php foreach ($this->getVars()['works'] as $work):?>
	<html>	
		<h1><?=$work['name']?></h1>
		<p><?=$work['content']?></p>
	</html>
<?php endforeach;?>