<?php 
class ProjectModel extends Model{
	
	private $table = 'works';
	
	var $validate = array(
			'name' => array(
					'rule' => 'la regle',
					'message' => 'vous devez preciser un titre'
			),
			'content' => array(
					'rule' => '([a-z0-9\-]+)',
					'message' => 'le message'
			)
			
	);

	public function validate($data){
		/*foreach ($validate as $k => $v ){
			
		}*/
		return true;
	}
	public function findCategories($id){
		$query = "SELECT  categories.name as cats
			FROM categories 
			join categories_works
			on cat_id = id 
			Where work_id = $id ";
		return $this->find($query);
	}
	
	public function addProjects($data){
		extract($data);
		$catid = $this->findOne('SELECT id FROM categories WHERE name="'.$cats.'"');		
		if($catid){ $catid = $catid['id'];};
		$queryworks = "INSERT INTO works (name, content) Values ('$name', '$content')";
		$this->query($queryworks);
		$workid = $this->lastInsertId();
		if(!$catid){
			$querycats = "INSERT INTO categories (name) VALUES ('$cats')";
			$this->query($querycats);
			$catid = $this->lastInsertId();
		}
		$querycatsworks =  'INSERT INTO categories_works (cat_id, work_id) VALUES ("'.$catid.'","'.$workid.'")';
		$this->query($querycatsworks);
		//$queryjoin = 
	}
	
	public function updateProjects($data){
		var_dump($data);
		extract($data);
		$catid = $this->findOne('SELECT id FROM categories WHERE name="'.$cats.'"');
		if($catid){ $catid = $catid['id'];};
		$queryworks = "UPDATE works SET name='$name', content ='$content' WHERE id='$id'";
		$this->query($queryworks);
		$workid = $id;
		if(!$catid){
			$querycats = "INSERT INTO categories (name) VALUES ('$cats')";
			$this->query($querycats);
			$catid = $this->lastInsertId();
		}
		$exist = $this->findOne('SElECT * FROM categories_works WHERE work_id="'.$workid.'" AND cat_id="'.$catid.'"');
		if(!$exist){
			$querycatsworks =  'INSERT INTO categories_works (cat_id, work_id) VALUES ("'.$catid.'","'.$workid.'")';
			$this->query($querycatsworks);
		}
		//$queryjoin =
	}
	
	public function deleteProject($id){
		$this->deleteById($id);
		$query = 'DELETE FROM categories_works WHERE work_id="'.$id.'"';
		$this->query($query);
	}
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