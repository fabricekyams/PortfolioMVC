<?php
class Router{
	/**
	 * Parser une URLS
	 * @param  $url 
	 */
	public static function parseURL($url,Request $request)
	{
		$params = array();
		if (isset($url)){
			$url = trim($url,'/');
			$explode = explode('/', $url);
			$request->setController($explode[0]);
			$action  = isset($explode[1]) ? $explode[1] : 'index';
			$request->setAction($action);
			$request->setParrams(array_slice($explode, 2));
			
		}
		
	} 
}