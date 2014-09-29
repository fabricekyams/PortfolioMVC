<?php 
class ProjectModel extends Model{
	
	private $table = 'works';
	
	
	/**
	 * 
	 * @return string
	 */
	public function getTable() {
		return $this->table;
	}
	
	/**
	 * 
	 * @param string $name
	 * @return ProjectModel
	 */
	public function setTable($table) {
		$this->table = $table;
		return $this;
	}
	
	
	
}