<div class="col-xs-12 col-sm-3 col-md-4"></div>
<div class="col-xs-12 col-sm-6 col-md-4">
	<div class="form-box">
		<div class="form-top">
			<h1>Edit wallet</h1>
			<?php
				echo $this->Form->postLink(
					$this->HTML->tag('span','',array('class'=>'glyphicon glyphicon-trash'))."", 
					array('controller' => 'Wallets', 'action' => 'delete', $wallet['Wallet']['id']),
					array('escape'=>false),__('Are you sure you want to delete?'),
					array('class'=>'btn btn-mini')
					);
			?>
		</div>
		<div class="form-mid">
			<?php echo $this->form->create('Wallet'); ?>
			<div class="form-group">
				<?php
					
				    echo $this->form->input('name', array('label'=> false , 'class'=>'form-control', 'placeholder'=>'Name..')); 
				    echo $this->form->input('currency', array('label'=> false , 'class'=>'form-control', 'placeholder'=>'Currency..'));
				    echo $this->form->input('starting_amount', array('label'=> false , 'class'=>'form-control', 'placeholder'=>'Starting amount..'));
				    // echo $this->Form->input('exclude_from_total', $options = array());
				    echo $this->form->button('Edit wallet', array('type'=>'submit','class'=>'btn'));
				?>
			</div>
		</div>
	</div>
</div>

<?php 
  
?>

    