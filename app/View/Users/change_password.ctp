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
					echo $this->Form->input('old_password', array('label'=> false , 'class'=>'form-control', 'placeholder'=>'Old Password..'));
					echo $this->Form->input('new_password', array('label'=> false , 'class'=>'form-control', 'placeholder'=>'New Password..'));
				    echo $this->form->button('Change Password', array('type'=>'submit','class'=>'btn'));
				?>
			</div>
		</div>
	</div>
</div>

<?php 
  
?>