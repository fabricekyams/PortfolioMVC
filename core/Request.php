<?php
/**
 * 
 * @author eclipse
 *
 */
class Request{

	private  $url;
	private $controller = 'home';
	private $action = 'index';
	private $parrams;
	/**
	 * 
	 */
	
	public function __construct()
	{
		if (isset($_SERVER['PATH_INFO'])){
		$this->setUrl($_SERVER['PATH_INFO']);
		}
		
	}
	
	/**
	 * 
	 * @return Ambigous <string, unknown>
	 */
	public function getUrl() {
		return $this->url;
	}
	
	/**
	 * 
	 * @param unknown $url
	 */
	public function setUrl($url) {
		$this->url = $url;
	}
	public function getController() {
		return $this->controller;
	}
	public function setController($controller) {
		$this->controller = $controller;
	}
	public function getAction() {
		return $this->action;
	}
	public function setAction($action) {
		$this->action = $action;

	}
	public function getParrams() {
		return $this->parrams;
	}
	public function setParrams($parrams) {
		$this->parrams = $parrams;

	}
	
	
	
}