<?php
class UserController extends Controller{

	public $auth = '1';
	
	public function login(){
		require_once  ROOT.DS.'core'.DS.'csrf.php';
		require_once  ROOT.DS.'core'.DS.'Form.php';
		$this->loadModel('user');
		$model = $this->getModel()['user'];
		$session = $this->getSession();
		if ($session->isLogged()){
			header('Location:' . WEBROOT.'private/projects');
			die();
		}
		if (!empty($this->getReq()->getData())){
			$data = $this->getReq()->getData();
			$connected = $model->Authenticate($data);
			if ($connected){
				$session->set(array(
						'AUTH' => $connected
				));
				$session->setFlash('Vous etes connecté','success');
				header('Location:' . WEBROOT.'private/projects');
				die();
			}else {
				$session = $this->getSession();
				$session->setFlash('Nom d\'utilistaeur ou mot de passe incorrect','danger');
			}
		}
		$this->render('login','layout');
	} 
	
	public function logout(){
		$session = $this->getSession();
		$session->unsetKey('AUTH');
		header('Location:' . WEBROOT.'private/user/login');
		die();
	}
	
}