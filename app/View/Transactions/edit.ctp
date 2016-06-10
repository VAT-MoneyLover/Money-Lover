<div class="col-xs-12 col-sm-3 col-md-4"></div>
<div class="col-xs-12 col-sm-6 col-md-4">
	<div class="form-box">
		<div class="form-top">
			<h1>Edit transaction</h1>
			<?php
				echo $this->Form->postLink(
					$this->HTML->tag('span','',array('class'=>'glyphicon glyphicon-trash'))."", 
					array('controller' => 'Transactions', 'action' => 'delete', $transaction['Transaction']['id']),
					array('escape'=>false),__('Are you sure you want to delete?'),
					array('class'=>'btn btn-mini')
					);
			?>
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
				    echo $this->form->button('Edit transaction', array('type'=>'submit','class'=>'btn'));
				    echo $this->Form->end();
				?>
				<br>
				<br>
				<?php 
				
				?>

			</div>
		</div>
	</div>
</div>




