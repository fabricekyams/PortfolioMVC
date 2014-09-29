<?php
abstract class Model {
	
	static $connection = array();
	
	private $conf = 'default';
	private $db;
	//private $table = false;
	
	public function __construct()
	{
		
		if (isset(Model::$connection[$this->conf])){
			$this->db=Model::$connection[$this->conf];
			return true;
		}
		
		$conf = Conf::$database[$this->conf];
		try {
			$pdo = new PDO(
					'mysql:host='.$conf['host'].';dbname='.$conf['database'].'',
					$conf['user'], 
					$conf['password'],
					array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			Model::$connection[$this->conf]= $pdo;
			$this->db= $pdo;
			$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		}catch (PDOException $e){
			echo 'impossble de se connecter à la db';
			//echo $e->getMessage();
			die();
		}
	}
	
	public function findone($id){
		$id = $this->db->quote($id);
		$query = 'SELECT * FROM '.$this->getTable().' WHERE id='.$id;
		$select=$this->db->query($query)->fetch();
		return $select;
	}
	
	public function findAll(){
		$query = 'SELECT * FROM '.$this->getTable();
		return $this->db->query($query)->fetchAll();
	}
	
	public function getBd() {
		return $this->bd;
	}
	public function setBd($bd) {
		$this->bd = $bd;
		return $this;
	}
	
}