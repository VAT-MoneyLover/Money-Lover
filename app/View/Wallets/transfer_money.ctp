<style>
	div.transferLabel{
		text-align: left;
	}
	div label.transferLabel{
		font-size: 16pt;
		font-weight: 300;

	}
</style>
<div class="col-xs-12 col-sm-3 col-md-4"></div>
<div class="col-xs-12 col-sm-6 col-md-4">
	<div class="form-box">
		<div class="form-top">
			<h1>Transfer Money</h1>
		</div>
		<div class="form-mid">
			<?php echo $this->form->create('Transaction'); ?>
			<div class="form-group">
				<div class="transferLabel">
					<label class="transferLabel">
						From Wallet
					</label>
					<div class="form-control">
						<p style="font-size: 14pt;">
							<?php echo $wallet['Wallet']['name'];?>
						</p>
					</div>
				</div>
				<div class="transferLabel">
					<label class="transferLabel">
						To Wallet
					</label>
					<?php
						echo $this->form->input('wallet_id', array('label'=> false , 'class'=>'form-control', 'placeholder'=>''));	// to wallet
					?>
				</div>
				<?php
					echo $this->form->input('cost', array('label'=> false , 'class'=>'form-control', 'placeholder'=>'Amount..'));
					echo $this->form->input('note', array('label'=> false , 'class'=>'form-control', 'placeholder'=>'Note..'));
					echo $this->form->input('category_id', array('label'=> false , 'class'=>'form-control', 'placeholder'=>''));			// select category
					echo $this->form->input('date', array('div'=>array('class'=>'input text form-inline'), 'label'=> false , 'class'=>'form-control'));
 					echo $this->form->button('Transfer money', array('type'=>'submit','class'=>'btn'));
					echo $this->form->end();
				?>
			</div>
		</div>
	</div>
</div>

<?php 
  
?>

    
<?php
	App:: import('controller', array('Users', 'Categories'));
	
	
	
?>