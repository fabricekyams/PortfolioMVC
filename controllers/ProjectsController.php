<?php
class ProjectsController extends Controller {
	
	public function index(){
		$this->loadModel('project');
		$results = $this->getModel()['project']->findAll();
		foreach ($results as $result){
			var_dump($result);
		}
		
		$this->addVars('works',array($results));
		$this->render('index');
		
	}
	
	public function view($id){
		$this->loadModel('project');
		$result = $this->getModel()['project']->findOne($id);
		if(empty($result)){
			$this->e404('Pas de projets de ce nom');
		}
		$this->addVars('work', array($result));
		$this->render('view');
	}
	
}