<?php
/**
 * Created by PhpStorm.
 * User: Thái
 * Date: 4/10/2016
 * Time: 10:58 AM
 */
echo $this->form->create('User');
echo $this->form->input('email');
echo $this->form->input('password');
echo $this->form->end('Login');
?>
<!-- <a class="btn btn-default facebook" href="<?php echo BASE_PATH.'fblogin'; ?>"> <i class="fa fa-facebook modal-icons"></i> Signin with Facebook </a> -->
<a class="btn btn-default google" href="<?php echo BASE_PATH.'googlelogin'; ?>"> <i class="fa fa-google-plus modal-icons"></i> Signin with Google </a> <br>
<?php
	echo $this->HTML->link('Forgot password', array('controller'=>'users', 'action'=>'forgotPassword'))
?>