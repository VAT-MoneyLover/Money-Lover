<style>
	.btn-link-1{
		width: 100%;
	}
</style>


<!-- <form role="form" action="" method="post" class="login-form"> -->
<?php echo $this->form->create('User', array('id'=>'login', 'role'=>'form', 'method'=>'post', 'class'=>'form-signin')); ?>
<div class="form-group">
	<label class="sr-only" for="form-username">Email</label>
	<!-- <input type="email" name="form-username" placeholder="Email..." class="form-username form-control" id="form-username"> -->
	<?php echo $this->form->input('email', array('label'=> false, 'type'=>'email', 'class'=>'form-username form-control', 'placeholder'=>'Email...')); ?>
</div>
<div class="form-group">
	<label class="sr-only" for="form-password">Password</label>
	<!-- <input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password"> -->
	<?php echo $this->form->input('password', array('label'=> false, 'type'=>'password', 'class'=>'form-password form-control', 'placeholder'=>'Password...')); ?>
</div>
<!-- <button type="submit" class="btn">Sign in!</button> -->
<div class="form-group">
	<?php echo $this->form->button('Login', array('type'=>'submit','class'=>'btn')); ?>
</div>

<!-- Login with FB and Google -->
<div class="form-group">
	<a class="btn btn-link-1 btn-link-1-google-plus" href="<?php echo BASE_PATH.'googlelogin'; ?>">
		<i class="fa fa-google-plus"></i> Signin with Google
	</a>
	<!-- <a class="btn btn-link-1 btn-link-1-facebook" href="<?php echo BASE_PATH.'fblogin'; ?>">
		<i class="fa fa-facebook"></i> Facebook
	</a> -->
</div>
<?php echo $this->HTML->link('Forgot password', array('controller'=>'users', 'action'=>'forgotPassword')); ?>
<!-- </form> -->
<?php echo $this->Form->end(); ?>

