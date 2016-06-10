<div class="col-xs-12 col-sm-3 col-md-4"></div>
<div class="col-xs-12 col-sm-6 col-md-4">
	<div class="form-box">
		<div class="form-top">
			<h1>Create a new wallet</h1>
		</div>
		<div class="form-mid">
			<?php echo $this->form->create('Wallet'); ?>
			<div class="form-group">
				<?php
					
				    echo $this->form->input('name', array('label'=> false , 'class'=>'form-control', 'placeholder'=>'Name..')); 
				    echo $this->form->input('currency', array('label'=> false , 'class'=>'form-control', 'placeholder'=>'Currency..'));
				    echo $this->form->input('starting_amount', array('label'=> false , 'class'=>'form-control', 'placeholder'=>'Starting amount..'));
				    // echo $this->Form->input('exclude_from_total', $options = array());
				    echo $this->form->button('Add wallet', array('type'=>'submit','class'=>'btn'));
				?>
			</div>
		</div>
	</div>
</div>

<?php 
  
?>

    