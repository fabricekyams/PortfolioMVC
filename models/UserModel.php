<?php
class UserModel extends Model {
	
	private $table = 'user';
	
	public function Authenticate($cred){
		$user = $cred['username'];
		$pass = sha1($cred['password']);
		return $this->Auth($user, $pass);
	
			
	}
	public function getTable() {
		return $this->table;
	}
	public function setTable($table) {
		$this->table = $table;
		return $this;
	}
	
}