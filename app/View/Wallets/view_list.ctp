<h2>Wallets</h2>
<h3>Hello  <?php echo $this->HTML->link(AuthComponent::user('email'), array('controller'=>'users', 'action'=>'view', AuthComponent::user('id'))) ; ?> </h3>

<!-- link create wallet -->
<?php echo $this->HTML->link('Create a wallet', array('controller' => 'wallets', 'action' => 'add'));
?>
<br>
<?php
if (AuthComponent::user()) {
    echo $this->HTML->link('Logout', array('controller' => 'users', 'action' => 'logout'));
} else {
    echo $this->HTML->link('Login', array('controller' => 'users', 'action' => 'login')).' or '.$this->HTML->link('Register', array('controller' => 'users', 'action' => 'add'));
}

?>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Currency</th>
        <th>Starting amount</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php
    foreach ($wallets as $wallet):
        if ($wallet['User']['id'] == AuthComponent::user('id')) :
        ?>
    <tr>
            <td><?php echo $this->HTML->link($wallet['Wallet']['name'], array('controller' => 'Wallets', 'action' => 'view', $wallet['Wallet']['id'])); ?></td>
                <td><?php echo $wallet['User']['email']; ?></td>
                <td><?php echo $wallet['Wallet']['currency']; ?></td>
                <td><?php echo $wallet['Wallet']['starting_amount']; ?></td>
                <td><?php echo $wallet['Wallet']['created']; ?></td>
                <td><?php echo $wallet['Wallet']['updated']; ?></td>
                <td><?php echo $this->HTML->link("Edit", array('controller' => 'Wallets', 'action' => 'edit', $wallet['Wallet']['id'])); ?></td>
                <td><?php echo $this->Form->postLink("Delete", array('controller' => 'Wallets', 'action' => 'delete', $wallet['Wallet']['id']), array('confirm' => 'Are you want to delete this wallet?')); ?></td>
        </tr>
        <tr>
            <?php
            endif;
            endforeach;
            unset($wallet);
            ?>

        </table>



