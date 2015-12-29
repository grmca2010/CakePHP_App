<div class="col_12">
  <?php
    echo $this->Form->create("Job"); ?>

    <fieldset>
      <legend>Add Job Listing</legend>
      <?php
        $state_list=array("AL"=>"Alabama","AK"=>"Alaska","AZ"=>"Arizona","AR"=>"Arkansas","CA"=>"California","CO"=>"Colorado");
        echo $this->Form->input("title");
        echo $this->Form->input("company_name");
        echo $this->Form->input("category_id",array("type"=>"select","options"=>$categories,"empty"=>"Select Category"));
        echo $this->Form->input("type_id",array("type"=>"select","options"=>$types,"empty"=>"Select type"));
        echo $this->Form->input("state",array("type"=>"select","options"=>$state_list,"empty"=>"Select state"));
        echo $this->Form->input("description");
        echo $this->Form->input("city");
        echo $this->Form->input("contact_email");
        echo $this->Form->end("Add Job");
      ?>
    </fieldset>
</div>
