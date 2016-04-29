<h1>Create a new transaction</h1>
<?php
/**
 * Created by PhpStorm.
 * User: Thái
 * Date: 4/9/2016
 * Time: 9:04 AM
 */
    echo $this->form->create('Transaction'); // model
//    echo $this->form->input('wallet_id');
    echo $this->form->input('category_id'); //  as collum
    echo $this->HTML->link('Add category', array('controller'=>'categories', 'action'=>'add'));
    echo $this->form->input('cost');
    echo $this->form->input('note');
    echo $this->form->input('with_people');
    echo $this->form->input('event');
    echo $this->form->input('date');
    echo $this->form->end('Add transaction');