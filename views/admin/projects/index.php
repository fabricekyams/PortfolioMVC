<html>
<h1>Mes Projets</h1>
<?=$this->getSession()->showFlash()?>
<table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>id</th>
          <th>name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $count=0; foreach ($this->getVars()['works'] as $work):?>
        	<tr>
	          <td><?= ++$count; ?></td>
	          <td><?= $work['id'];?></td>
	          <td><?= $work['name']?></td>
	          <td>
	          	<a href="<?=WEBROOT?>private/projects/edit/<?=$work['id'] ?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
	          	<a href="<?=WEBROOT?>private/projects/delete/<?=$work['id'] ?>" class="btn btn-danger" onclick="return confirm('ETES VOUS SUR?')"><span class="glyphicon glyphicon-trash"></span></a>
	          	</td>
	        </tr>   
        <?php endforeach;?>
       <tr>
       <td><a href="<?=WEBROOT?>private/projects/edit/" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Ajouter un projet</a ></td>
       </tr>
      </tbody>
    </table>
</html>