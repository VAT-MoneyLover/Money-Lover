<?php
	echo $this->form->create('User', array('enctype' => 'multipart/form-data'));
	echo $this->Form->input('avatar', array('type'=> 'file'));
	echo $this->Form->end('Submit');
?>
