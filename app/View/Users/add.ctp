<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('password');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Wallets'), array('controller' => 'wallets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wallet'), array('controller' => 'wallets', 'action' => 'add')); ?> </li>
	</ul>
</div>
<!--
<div class="col-sm-4">
	<div class="form-box">
		<div class="form-top">
    		<div class="form-top-left">
    			<h3>Sign up now</h3>
        		<p>Fill in the form below to get instant access:</p>
    		</div>
    		<div class="form-top-right">
    			<i class="fa fa-pencil"></i>
    		</div>
        </div>
        <div class="form-bottom">
            <form role="form" action="" method="post" class="registration-form">
            	
                <div class="form-group">
                	<label class="sr-only" for="form-email">Email</label>
                	<input type="email" name="form-email" placeholder="Email..." class="form-email form-control" id="form-email">
                </div>
                
                <div class="form-group">
                	<label class="sr-only" for="form-last-name">Last name</label>
                	<input type="password" name="form-last-name" placeholder="Password" class="form-last-name form-control" id="form-last-name">
                </div>
                <button type="submit" class="btn">Sign me up!</button>
            </form>
        </div>
	</div>
	
</div>
-->