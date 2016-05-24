<!-- <?php
	//echo $this->Form->create('User', array('id'=>'forgotpassword', 'role'=>'form'));
	echo $this->form->create('User');
	echo $this->form->input('email', array('id'=>'email', 'type'=>'email', 'placeholder'=>'Email address'));
	echo $this->Form->button('Reset Password', array('id'=>'password_btn', 'type'=>'submit'));
	echo $this->form->end();
?> -->
<style>
	.btn-link-1{
		width: 100%;
	}
</style>
<div class="col-xs-12 col-sm-6 col-md-4">
	<div class="form-box">
		<div class="form-top">
			<div class="form-top-left">
				<h3>Forgot password?</h3>
				<p>Fill in the form below to set new password: </p>
			</div>
			<div class="form-top-right">
				<i class="fa fa-pencil"></i>
			</div>
		</div>
		<div class="form-bottom">
			<!-- <form role="form" action="" method="post" class="login-form"> -->
			<?php echo $this->form->create('User'); ?>
			<div class="form-group">
				<?php 
					$this->Session->flash();
					if ($this->Session->check('Message.success')) {
						echo $this-> Session-> flash('success');
					}
					if ($this->Session->check('Message.error')) {
						echo $this-> Session-> flash('error');
					}
				?>
				<label class="sr-only" for="form-email">Email</label>
				<!-- <input type="email" name="form-username" placeholder="Email..." class="form-username form-control" id="form-username"> -->
				<?php echo $this->form->input('email', array('label'=> false, 'type'=>'email', 'class'=>'form-email form-control', 'placeholder'=>'Email...')); ?>
			</div>
			<!-- <button type="submit" class="btn">Sign in!</button> -->
			<div class="form-group">
				<?php echo $this->form->button('Reset Password', array('type'=>'submit','class'=>'btn')); ?>
			</div>

			
			<!-- </form> -->
			<?php echo $this->Form->end(); ?>
		</div>
		<div class="form-footer">
			<div class="row">
				<div class="col-sm-6">
					<i class="fa fa-lock"></i>
					<a href="<?php echo BASE_PATH.'users/register'; ?>"> Register </a>

				</div>

				<div class="col-sm-6">
					<i class="fa fa-check"></i>
					<a href="<?php echo BASE_PATH.'users/login'; ?>"> Login </a>
				</div>
			</div>
		</div>
		
	</div>
</div>