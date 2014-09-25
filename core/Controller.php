<?php
class Controller{
	
	private $req;
	private $vars = array();
	private  $layout = 'default';
	
	public function __construct(Request $req){
		$this->setReq($req);
	}
	
	public function render($view){
		extract($this->getVars());
		$view = ROOT.DS.'views'.DS.$this->getReq()->getController().DS.$view.'.php';
		ob_start();
		require($view);
		$renderContent = ob_get_clean();
		require ROOT.DS.'views'.DS.'template'.DS.$this->getLayout().'.php';
	}
	
	public function getReq() {
		return $this->req;
	}
	
	public function setReq($req) {
		$this->req = $req;
	}
	
	public function getVars() {
		return $this->vars;
	}
	
	public function addVars($vars) {
		foreach ($vars as $k=>$v){
			$this->vars[$k] = $v;
		}
		
	}
	public function getLayout() {
		return $this->layout;
	}
	public function setLayout($layout) {
		$this->layout = $layout;
	}
	
	
	
}