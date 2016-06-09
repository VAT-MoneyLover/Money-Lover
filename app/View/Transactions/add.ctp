<div class="col-xs-12 col-sm-3 col-md-4"></div>
<div class="col-xs-12 col-sm-6 col-md-4">
	<div class="form-box">
		<div class="form-top">
			<h1>Create a new transaction</h1>
		</div>
		<div class="form-mid">
			<?php echo $this->form->create('Transaction');?>
			<div class="form-group">
				<?php
					echo $this->HTML->link('Add category', array('controller'=>'categories', 'action'=>'add'));
					echo $this->form->input('category_id', array('label'=> false , 'class'=>'form-control')); 
				    echo $this->form->input('cost', array('label'=> false , 'class'=>'form-control', 'placeholder'=>'How much?'));
				    echo $this->form->input('note', array('label'=> false , 'class'=>'form-control', 'placeholder'=>'Note..'));
				    echo $this->form->input('with_people', array('label'=> false , 'class'=>'form-control', 'placeholder'=>'With..'));
				    echo $this->form->input('event', array('label'=> false , 'class'=>'form-control', 'placeholder'=>'Even..'));
				    echo $this->form->input('date', array('div'=>array('class'=>'input text form-inline'), 'label'=> false , 'class'=>'form-control'));
				    echo $this->form->button('Add transaction', array('type'=>'submit','class'=>'btn'));
				?>
			</div>
		</div>
	</div>
</div>

<?php 
  
?>



