<?php
	App:: import('controller', array('Users', 'Categories'));
	
	echo $this->form->create('Transaction');
	echo $this->form->input('wallet_id');	// to wallet
	echo $this->form->input('Amount');
	echo $this->form->input('Note');
	echo $this->form->input('category_id');			// select category
	echo $this->form->input('date');
	echo $this->form->end('Transfer money');
?>