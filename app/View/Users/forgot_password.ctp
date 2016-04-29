<?php
	//echo $this->Form->create('User', array('id'=>'forgotpassword', 'role'=>'form'));
	echo $this->form->create('User');
	echo $this->form->input('email', array('id'=>'email', 'type'=>'email', 'placeholder'=>'Email address'));
	echo $this->Form->button('Reset Password', array('id'=>'password_btn', 'type'=>'submit'));
	echo $this->form->end();
?>