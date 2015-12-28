<?php echo $this->element("search"); ?>
  <div class="col_12 column">
    <ul id="category_block">
    <?php foreach($categories as $category) : ?>
      <li><?php echo $this->Html->link($category["Category"]["name"],array('action' => 'browse', $category["Category"]["id"])); ?>
      </li>
    <?php endforeach; ?>
  </ul>
  </div>
  <div class="col_12 column">
    <h3>Latest Job Listings</h3>
    <?php if(sizeof($jobs)==0){

        echo "<h5>OOps, There is no job under this category</h5>";

    } ?>
    <ul id="listings">

      <?php foreach($jobs as $job) : ?>
        <?php #echo "<pre>";print_r($job);
         $single_job=$job["Job"];
           ?>
        <li>
          <div class="type">
            <span style="background-color:<?php echo $job["Type"]["color"]; ?>"><?php echo $job["Type"]["name"]; ?></span>
          </div>
          <div class="description">
            <h5><?php echo $single_job["title"] ?> (<?php echo $single_job["city"] ?>,<?php echo $single_job["state"] ?>)</h5>
            <span id="list_date">
             <?php echo  $this->Time->format('F jS h:i A',$job['Job']['created']); ?>
           </span>
            <?php echo $this->Text->truncate($single_job['description'],250, array('ellipsis' => '...','exact' => false)); ?>
            <?php echo $this->Html->link('Read More',array('controller' => 'jobs', 'action' => 'view', $single_job['id'])); ?>
          </div>
        </li>
      <?php endforeach; ?>

    </ul>
  </div>
