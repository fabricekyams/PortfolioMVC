
<h1>Editer un Projets</h1>
<?php echo  $this->getSession()->showFlash();
$work=$this->getVars();
if (!empty($work)){
	$work = $this->getVars()['work'];
}?>
<div class="row">
	<div class="col-md-8">
		<form  action="#" method="post" enctype="multipart/form-data">
		        <?= input('name', 'nom du projet',$work)?>
		        <?= textarea('content', 'Description projet',$work); ?>
		        <?= input('cats', 'categories')?>
		        <?php 
				if (isset($work['cats'])):
					foreach ($work['cats'] as $cat):?>
					 <span class="skills" ><?=$cat['cats'] ?></span>
					<?php endforeach;
				endif;
			 	?>
		       	<?= csrfInput(); ?>
		       <div class="form-group">
		              
			       <input type="file" name="image[]"  >
			       <input type="file" name="image[]" class="hidden" id="duplicate">
			       <a href="#" class="btn btn-info" id="duplicate-btn">Ajouter une image</a>
		       </div>   
		       <div class="form-group">
		        	<button type="submit" name="_submit" class="btn btn-primary">Enregistrer</button>
		        </div>
		</form>
	</div>
	<!--  <div class="col-md-4">
	<div class="row">
		<?php foreach ($imgs as $img):?>
		
		  <div class="col-md-6">
		    <div class="thumbnail">
		      <img src="<?= WEBROOT;?>img/works/<?=$img['name']?>" alt="" >
		      <div class="caption">
		        <p>
		        <a href="?del_image=<?= $img['id']?>&<?=csrf()?>&imgname=<?=$img['name']?>" onclick="return confirm('DELETE: SUR?')"  class="btn btn-default">
		        	<span class="glyphicon glyphicon-trash"></span>
		        </a> 
		        <a href="?highlight_img=<?=$img['id'];?>&id=<?=$_GET['id']?>&<?=csrf();?>" class="btn btn-default" role="button">
		        	<span class="glyphicon glyphicon-star"></span>
		        </a></p>
		      </div>
		    </div>
		  </div>
		
				
		<?php endforeach;?>
		</div>
	</div>-->
</div>


