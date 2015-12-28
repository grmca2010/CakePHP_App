<?php
class JobsController extends AppController {

    public function index() {
        $options = array('order' =>array('Job.created' =>"asc" ),"limit"=>0 );
        $jobs=$this->Job->find("all",$options);
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
}
?>
