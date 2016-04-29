<div class="users view">
	<h2><?php echo __('User'); ?></h2>
	<!-- link change passwordd -->
	<p><?php echo $this->HTML->link('Change password', array('controller'=>'users', 'action'=>'changePassword', AuthComponent::user('id'))); ?></p>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avatar'); ?></dt>
		<dd>
			<?php echo h($user['User']['avatar']); 
				echo $this->HTML->image($user['User']['avatar'], array('width'=>'200px'));
			?>
			
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($user['User']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
	<img src="<?php echo $user['User']['avatar']; ?> "  width="300px" />
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Wallets'), array('controller' => 'wallets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wallet'), array('controller' => 'wallets', 'action' => 'add')); ?> </li>
	</ul>
</div>
<!-- 
<div class="related">
	<h3><?php echo __('Related Transactions'); ?></h3>
	<?php if (!empty($user['Transaction'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Wallet Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Cost'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('With'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Event'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Transaction'] as $transaction): ?>
		<tr>
			<td><?php echo $transaction['id']; ?></td>
			<td><?php echo $transaction['category_id']; ?></td>
			<td><?php echo $transaction['wallet_id']; ?></td>
			<td><?php echo $transaction['user_id']; ?></td>
			<td><?php echo $transaction['cost']; ?></td>
			<td><?php echo $transaction['note']; ?></td>
			<td><?php echo $transaction['with']; ?></td>
			<td><?php echo $transaction['date']; ?></td>
			<td><?php echo $transaction['event']; ?></td>
			<td><?php echo $transaction['created']; ?></td>
			<td><?php echo $transaction['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transactions', 'action' => 'view', $transaction['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transactions', 'action' => 'edit', $transaction['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transactions', 'action' => 'delete', $transaction['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transaction['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Wallets'); ?></h3>
	<?php if (!empty($user['Wallet'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Currency'); ?></th>
		<th><?php echo __('Starting Amount'); ?></th>
		<th><?php echo __('Exclude From Total'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Wallet'] as $wallet): ?>
		<tr>
			<td><?php echo $wallet['id']; ?></td>
			<td><?php echo $wallet['user_id']; ?></td>
			<td><?php echo $wallet['name']; ?></td>
			<td><?php echo $wallet['currency']; ?></td>
			<td><?php echo $wallet['starting_amount']; ?></td>
			<td><?php echo $wallet['exclude_from_total']; ?></td>
			<td><?php echo $wallet['created']; ?></td>
			<td><?php echo $wallet['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'wallets', 'action' => 'view', $wallet['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'wallets', 'action' => 'edit', $wallet['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'wallets', 'action' => 'delete', $wallet['id']), array('confirm' => __('Are you sure you want to delete # %s?', $wallet['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Wallet'), array('controller' => 'wallets', 'action' => 'add')); ?> </li>
		</ul>
	</div>
-->

</div>
