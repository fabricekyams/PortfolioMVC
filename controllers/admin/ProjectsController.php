<?php
class ProjectsController extends Controller {
	
	public function index(){
		$this->loadModel('project');
		$model=$this->getModel()['project'];
		$results = $model->findAll();
		for ($i=0; $i<count($results);++$i){
			$cats = $model->findCategories($results[$i]['id']);
			if(!empty($cats)){
				$results[$i]['cats']=$cats;		
			}
		}
		$this->addVars('works',array($results));
		$this->render('index');
		
	}
	
	public function edit($id=null){
		require_once  ROOT.DS.'core'.DS.'csrf.php';
		require_once  ROOT.DS.'core'.DS.'Form.php';
		$this->loadModel('project');
		$model = $this->getModel()['project'];
		if(isset($id)){
			if(!empty($this->getReq()->getData())){
				$data = $this->getReq()->getData();
				$data['id']=$id;
				if ($model->validate($data)){
					$model->updateProjects($data);
				}else{
					$session = $this->getSession();
					$session->setFlash( 'les donnée ne sont pas valides','danger');
				}
					
			}
			
			$result = $model->findOneById('id',$id);
			if(empty($result)){
				$this->e404('Pas de projets de ce nom');
			}
			$cats = $model->findCategories($id);
			if(!empty($cats)){
				$result['cats']=$cats;
			}
			$this->addVars('work', array($result));
			
		}
		
		if(!isset($id) && !empty($this->getReq()->getData())){
			$data = $this->getReq()->getData();
			if ($model->validate($data)){
				$model->addProjects($data);
				$this->redirect(WEBROOT.'private/projects');
			}else{
				$session = $this->getSession();
				$session->setFlash('les donnée ne sont pas valides','danger');
			}
			
		}
		
		$this->render('workedit');
			
	}
	
	public function delete($id=''){
		$this->loadModel('project');
		$model=$this->getModel()['project'];
		$model->deleteProject($id);
		$session = $this->getSession();
		$session->setFlash('Projet supprimé avec succès','success');
		$this->redirect(WEBROOT.'private/projects');
				
	}
	
}