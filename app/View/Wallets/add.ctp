<h1>Add wallet</h1>
<?php

    echo $this->form->create('Wallet'); // model Wallet
    echo $this->form->input('name'); // name as collum
    echo $this->form->input('currency');
    echo $this->form->input('starting_amount');
    echo $this->Form->input('exclude_from_total', $options = array());
    echo $this->form->end('Add wallet');