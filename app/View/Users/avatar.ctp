<div class="col-xs-12 col-sm-3 col-md-4"></div>
<div class="col-xs-12 col-sm-6 col-md-4">
	<div class="form-box">
		<div class="form-top">
			<h1>Change Password</h1>
		</div>
		<div class="form-mid">
			<?php echo $this->Form->create('User'); ?>
			<div class="form-group">
				<?php
					echo $this->Form->input('avatar', array('type'=> 'file'), array('label'=> false , 'class'=>'form-control'));
					echo $this->Form->end('Submit');
				?>
			</div>
		</div>
	</div>
</div>

<?php 
  
?>
<?php
	//echo $this->form->create('User', array('enctype' => 'multipart/form-data'));
	//echo $this->Form->input('avatar', array('type'=> 'file'));
	
?>
