<!DOCTYPE html>
<html>
<head>
	<title>Money Lover</title>
	<meta charset="utf-8">
	<?php
	echo $this->HTML->css(array(
		'css/material.min.css',
		'bootstrap/css/bootstrap_2.min.css',
		'font-awesome/css/font-awesome.min.css',
		'css/mainStyle.css'
		));
		?>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	</head>
	<body>
		<!-- sidebar -->
		<?php 
			echo $this->element('sidebar');
		 ?>
		<!-- body -->
		<div class="header">
			<div class="container">
					<?php 
					echo $this->fetch('content');
					?>
			</div>
		</div>
		<!-- Footer -->
    	<?php echo $this->element('footer') ?>
		

<?php
echo $this->HTML->script(array(
	'jquery.js',
	'bootstrap2.min.js',
	'material.min.js',
	'mainStyle.js'
	));
	?>
</body>
</html>		