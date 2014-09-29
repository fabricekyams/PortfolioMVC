<?php
abstract class Controller{
	
	private $req;
	private $vars = array();
	private  $layout = 'default';
	private  $model = array();
	 	
	/**
	 * 
	 * @param Request $req
	 */
	public function __construct(Request $req){
		$this->setReq($req);
	}
	
	/**
	 * 
	 * @param unknown $view
	 */
	public function render($view){
		extract($this->getVars());
		$view = ROOT.DS.'views'.DS.$this->getReq()->getController().DS.$view.'.php';
		ob_start();
		require($view);
		$renderContent = ob_get_clean();
		require ROOT.DS.'views'.DS.'template'.DS.$this->getLayout().'.php';
	}
	
	/**
	 * 
	 * @param unknown $vars
	 */
	
	public function addVars($name, $vars) {
		foreach ($vars as $v){
			$this->vars[$name] = $v;
		}
	
	}
	
	/**
	 * 
	 * @param Model $name 
	 */
	
	public function loadModel($name){
		$modelName = ucfirst($name).'Model';
		$modelFile = ROOT.DS.'models'.DS.$modelName.'.php';
		require_once $modelFile;
		$this->addModel($name, $modelName);

		
		

	}
	/**
	 *
	 * @param unknown $name
	 * @param unknown $modelName
	 */
	public function addModel($name, $modelName) {
		if (!isset($this->model[$name])){
			$this->model[$name] = new $modelName();
		}
	}
	
	/**
	 * 
	 * @param unknown $message
	 */
	public function e404($message){
		header("HTTP/1.0 404 Not Found");
		echo "ERROR 404: ".$message;
		die();
	}
	/**
	 * 
	 */
	public function getReq() {
		return $this->req;
	}
	
	/**
	 * 
	 * @param unknown $req
	 */
	public function setReq($req) {
		$this->req = $req;
	}
	
	/**
	 * 
	 * @return multitype:
	 */
	public function getVars() {
		return $this->vars;
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getLayout() {
		return $this->layout;
	}
	
	/**
	 * 
	 * @param unknown $layout
	 */
	public function setLayout($layout) {
		$this->layout = $layout;
	}
	
	/**
	 * 
	 */
	public function getModel() {
		return $this->model;
	}
	
	
	
	
	
}