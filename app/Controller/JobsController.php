<?php
class JobsController extends AppController {

    public function dashboard() {
      if(AuthComponent::user('id')){
          $jobs=$this->Job->find("all",array("conditions"=>array("Job.user_id"=>AuthComponent::user('id'))));
      } else {
        $jobs=$this->Job->find("all");
      }

      $this->set("title_page_layout","Job Finds - Job Dashboard");
      $this->set("jobs",$jobs);
    }
    public function index() {
        $options = array('order' =>array('Job.created' =>"asc" ),"limit"=>0 );
        $jobs=$this->Job->find("all",$options);
        $categories = $this->Job->Category->find("all",array('order' => array("Category.name"=>"asc")));
        $this->set("categories",$categories);
        $this->set("title_page_layout","Job Finds - Job Listing");
        $this->set("jobs",$jobs);
        #echo "<pre>";
        #print_r($jobs);
        #die();
  	}
    public function view($categoryId){
      if(!$categoryId){
  			throw new NotFoundException(__('Invalid job listing'));
  		}

  		$job = $this->Job->findById($categoryId);

  		if(!$job){
  			throw new NotFoundException(__('Invalid job listing'));
  		}

  		//Set Title
  		$this->set('title_page_layout', $job['Job']['title']);

  		$this->set('job', $job);
    }
    public function browse($category=null){

      $conditions = array();

      If($this->request->is("post")){

        if($this->request->data("keywords")  !=  "" ){
          $conditions[]=array("OR" => array(
              "Job.title LIKE "=>"%".$this->request->data("keywords")."%",
              "Job.description LIKE "=>"%".$this->request->data("keywords")."%"
            ));
        }
        if($this->request->data("state_select")  !=  "" ){
          $conditions[]=array("OR" => array(
              "Job.state LIKE "=>"%".$this->request->data("state_select")."%"
            ));
        }
        if($this->request->data("category_select")  !=  "" ){
          $conditions[]=array("OR" => array(
              "Job.category_id LIKE "=>"%".$this->request->data("category_select")."%"
            ));
        }

      }

      $categories = $this->Job->Category->find("all",array('order' => array("Category.name"=>"asc")));
      $this->set("categories",$categories);

      if($category != null){
  			//Match Category
  			$conditions[] =  array(
  					'Job.category_id LIKE' => "%" . $category . "%"
  			);
  		}

      //Set Query Options
  		$options = array(
  				'order' => array('Job.created' => 'desc'),
  				'conditions' => $conditions,
  				'limit' => 8
  		);

  		//Get Job Info
  		$jobs = $this->Job->find('all', $options);
      //Set Title
  		$this->set('title_for_layout', 'JobFinds | Browse For A Job');

  		$this->set('jobs', $jobs);
    }

    public function add() {
      $this->set("title_page_layout","Job Finds - Add Job");
      $categories=$this->Job->Category->find("list");
      $this->set("categories",$categories);

      $types=$this->Job->Type->find("list");
      $this->set("types",$types);

      If($this->request->is("post")){
          $this->Job->create();
          $this->request->data['Job']['user_id'] = $this->Auth->user('id');
          if($this->Job->save($this->request->data)){
              $this->Session->setFlash(__("Job has been added in the list"));
              return $this->redirect(array("action"=>"index"));
          }
          $this->Session->setFlash(__("The job has not been created.Contact support team('Senbagavalli')"));

      }

  	}

    public function edit($id){
    		//Get Categories for select list
    		$options = array(
    				'order' => array('Category.name' => 'asc')
    		);
    		//Get Categories
    		$categories = $this->Job->Category->find('list', $options);
    		//Set Categories
    		$this->set('categories', $categories);

    		//Get types for select list
    		$types = $this->Job->Type->find('list');
    		//Set Types
    		$this->set('types', $types);

    		if(!$id){
    			throw new NotFoundException(__('Invalid job listing'));
    		}

    		$job = $this->Job->findById($id);

    		if(!$job){
    			throw new NotFoundException(__('Invalid job listing'));
    		}

    		if($this->request->is(array('job', 'put'))){
      			$this->Job->id = $id;

      			if($this->Job->save($this->request->data)){
      				$this->Session->setFlash(__('Your job has been updated'));
      				return $this->redirect(array('action' => 'index'));
      			}

      			$this->Session->setFlash(__('Unable to update your job'));
		      }

    		if(!$this->request->data){
    			   $this->request->data = $job;
    		}
	}

	/*
	 * Delete a Job
	 */
	 public function delete($id){
  		if ($this->request->is('get')) {
  			throw new MethodNotAllowedException();
  		}

  		if ($this->Job->delete($id)) {
  			$this->Session->setFlash(
  					__('The job with id: %s has been deleted.', h($id))
  			);
  			return $this->redirect(array('action' => 'index'));
  		}
	 }
}
?>
