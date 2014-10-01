<?php  
echo $this->getSession()->showFlash();
?>
<div class="blck form-signin">
<form class=" " action="#" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <?= input('username', "nom utilisateur")?>
        <?= input('password', 'mot de passe','','password')?>
        <label class="checkbox">
          <input type="checkbox" name="_remember_me" value="on""> Remember me
        </label>
        <button type="submit" name="_submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
</form>
</div>
