
<div class="row">
 <?php foreach ($this->getVars()['works'] as $work):?>
  <div class=" col-sm-6 col-md-4">
    
     <a href="<?=WEBROOT?>projects/view/<?=$work['id']?>" class="thumbnail"> 
      <img src=""  data-src="" alt="..." style="height: 200px; width: 100%; display: block;">
      <div class="caption">
      <?php 
		if (isset($work['cats'])):
			foreach ($work['cats'] as $cat):?>
			 <span class="skills" ><?=$cat['cats'] ?></span>
			<?php endforeach;
		endif;
	 ?>
     
        <h3><?=$work['name'] ?></h3>       
      </div>
      </a>

  </div>
  <?php endforeach;?>
</div>