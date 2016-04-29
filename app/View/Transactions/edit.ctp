<h1>Edit Transaction</h1>
<?php

    echo $this->form->create('Transaction'); // model
    echo $this->form->input('category_id'); //  as collum
    echo $this->HTML->link('Add category', array('controller'=>'categories', 'action'=>'add'));
    echo $this->form->input('cost');
    echo $this->form->input('note');
    echo $this->form->input('with_people');
    echo $this->form->input('event');
    echo $this->form->input('date');
    echo $this->form->end('Add transaction');