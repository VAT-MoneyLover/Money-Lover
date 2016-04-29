<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Thái-->
<!-- * Date: 4/9/2016-->
<!-- * Time: 8:03 AM-->
<!-- */-->
<h1>Edit wallet</h1>
<?php

    echo $this->form->create('Wallet'); // model Wallet
    echo $this->form->input('name'); // name as collum
    echo $this->form->input('currency');
    echo $this->form->input('starting_amount');
    echo $this->Form->input('exclude_from_total');
    echo $this->form->end('Edit wallet');