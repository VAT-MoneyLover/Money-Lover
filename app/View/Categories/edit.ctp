<div class="col-xs-12 col-sm-3 col-md-4"></div>
<div class="col-xs-12 col-sm-6 col-md-4">
	<div class="form-box">
		<div class="form-top">
			<h1>Edit category</h1>
			<?php
				echo $this->Form->postLink(
					$this->HTML->tag('span','',array('class'=>'glyphicon glyphicon-trash'))."", 
					array('controller' => 'Categories', 'action' => 'delete', $category['Category']['id']),
					array('escape'=>false),__('Are you sure you want to delete?'),
					array('class'=>'btn btn-mini')
					);
			?>
		</div>
		<div class="form-mid">
			<?php echo $this->Form->create('Category');?>
			<div class="form-group">
				<?php
					//echo $this->Form->input('wallet_id', array('label'=> false , 'class'=>'form-control'));
					echo $this->Form->input('name', array('label'=> false , 'class'=>'form-control', 'placeholder'=>'Category"s name'));
					echo $this->Form->select('type', 
						array('0'=>'Expense', '1'=>'Income'), 
						array('empty'=>false, 'label'=> false , 'class'=>'form-control')
						
						);
					echo $this->form->button('Edit category', array('type'=>'submit','class'=>'btn'));
					?>
			</div>
		</div>
	</div>
</div>
