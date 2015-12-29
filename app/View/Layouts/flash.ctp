<style>
.flash_good {
background: #e5f2be;
border:2px solid #bedf5d;
padding:10px;
font-weight:bold;
}
.flash_bad {
background: #eccecf;
border:2px solid #9e0b0f;
padding:10px;
font-weight:bold;
}
.flash_good img, .flash_bad img {
float:right;
}
</style>
<div class="flash_good">
	<a href="/" class="cancel"><img src="/img/icons/cross.png" alt="Cross Icon" /></a>
	<?php echo $content_for_layout; ?>
</div>
