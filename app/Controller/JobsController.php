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
    public function browse($category=null){

      $conditions = array();

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
