<!DOCTYPE html>
<html>
<head>
	<!-- META -->
	<title>Jobs Finds</title>
  <?php echo $this->Html->charset(); ?>

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="" />

  <?php
	echo $this->Html->meta('icon');

	echo $this->Html->css('kickstart');
  echo $this->Html->css('style');
	echo $this->Html->script('jquery');
	echo $this->Html->script('kickstart');

  //need to remove later
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');

	?>
</head>
<body>
<div id="container" class="grid">
	<header>
		<div class="col_6 column">
			<h1><a href="<?php echo $this->webroot; ?>"><strong>Job</strong>Finds</a></h1>
		</div>
		<div class="col_6 column right">
			<form id="add_job_link" action="<?php echo $this->webroot; ?>jobs/add">
				<button class="large green"><i class="icon-plus"></i>Add Job</button>
			</form>
		</div>
	</header>

	<div class="col_12 column">
		<!-- Menu Horizontal -->
		<ul class="menu">
	<!--	<li>	<?php echo $this->here; ?></li> -->
		<li <?php echo ($this->here=="/jobfinds/")?'class="current"':'' ?> ><a href="<?php echo $this->webroot; ?>"><i class="icon-home"></i> Home</a></li>
		<li <?php echo ($this->here=="/jobfinds/jobs/browse")?'class="current"':'' ?> ><a href="<?php echo $this->webroot; ?>jobs/browse"><i class="icon-desktop"></i> Browse Jobs</a></li>
		<li <?php echo ($this->here=="/jobfinds/users/register")?'class="current"':'' ?>><a href="<?php echo $this->webroot; ?>users/register"><i class="icon-user"></i> Register</a></li>
		<li <?php echo ($this->here=="/jobfinds/users/login")?'class="current"':'' ?>><a href="<?php echo $this->webroot; ?>users/login"><i class="icon-key"></i> Login</a></li>
		</ul>
	</div>

<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>

		<div class="clearfix"></div>
		<footer><?php echo $this->element('sql_dump'); ?>
			<p>Copyright @copy; 2014, JobFinds, All Rights Reserved</p>
		</footer>
</div> <!-- End Grid -->
</body>
</html>
