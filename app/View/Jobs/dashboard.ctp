<br><h4>Dashboard</h4>
<table  cellspacing="0" cellpadding="0" class="tight">
	<thead><tr class="alt first last">
		<th rel="0" value="Title">Title</th>
		<th rel="1" value="Company Name">Company Name</th>
		<th rel="2" value="Contact Email">Contact Email</th>
		<th rel="3" value="Actions">Actions</th>
	</tr></thead>
<tbody>
<?php foreach($jobs as $job) :
   $single_job=$job["Job"]; ?>

	<tr class="first">
		<td value="<?php echo $single_job["title"]; ?>"><?php echo $single_job["title"]; ?></td>
		<td value="<?php echo $single_job["company_name"]; ?>"><?php echo $single_job["company_name"]; ?></td>
		<td value="<?php echo $single_job["contact_email"]; ?>"><?php echo $single_job["contact_email"]; ?></td>
		<td value="	">
      <?php echo $this->Html->link('Edit', array('action' => 'edit', $job['Job']['id'])); ?> |
      <?php echo $this->Form->postLink('Delete',array('action' => 'delete', $job['Job']['id']),array('confirm' => 'Are you sure?')); ?>
    </td>
	</tr>
<?php endforeach; ?>
</tbody>
</table>
