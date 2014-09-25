<?php

class Dispatcher{
	
	var $req;
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->req= new Request();
		Router::parseURL($this->req->getUrl(),$this->req);
		$controller = $this->loadController();
		if(in_array($this->req->getAction(),get_class_methods($controller) )){
			call_user_func_array(array($controller, $this->req->getAction()), array());
		}else{
			$this->error("Cette action n\'exite pas");
		}		
	}

	public function loadController(){
		$name = ucfirst($this->req->getController()).'Controller';
		
		if(file_exists(ROOT.DS.'controllers'.DS.$name.'.php')){
			$controllerFile = ROOT.DS.'controllers'.DS.$name.'.php';
			require $controllerFile;
			return  new $name($this->req);
	
		}else {
			$this->error('Ce controlleur n\'existe pas');	
		}
	}
	

	public function error($message){
		header("HTTP/1.0 404 Not Found");
		echo "ERROR 404: ".$message;
		die();
	}
	
	
	
}