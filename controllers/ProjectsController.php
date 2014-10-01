<?php
class ProjectsController extends Controller {
	
	public function index(){
		$this->loadModel('project');
		$model=$this->getModel()['project'];
		$results = $model->findAll();
		
		for ($i=0; $i<count($results);++$i){
			$cats = $model->findCategories($results[$i]['id']);
			$results[$i]['cats']=array();
			if(!empty($cats)){
				$results[$i]['cats']=$cats;		
			}
		}
		$this->addVars('works',array($results));
		$this->render('index');
		
	}
	
	public function view($id=''){
		$this->loadModel('project');
		$result = $this->getModel()['project']->findOneById('id',$id);
		if(empty($result)){
			$this->e404('Pas de projets de ce nom');
		}
		$this->addVars('work', array($result));
		$this->render('view');
		
	}
	
}