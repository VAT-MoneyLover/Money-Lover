<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Thái-->
<!-- * Date: 4/9/2016-->
<!-- * Time: 8:55 PM-->
<!-- */-->
<h1>Transaction</h1>
<table>
    <tr>
        <td>ID</td>
        <td>Wallet ID</td>
        <td>Wallet Name</td>
        <td></td>
    </tr>

    <?php
    foreach ($transactions as $transaction):
        ?>
        <tr>
            <td><?php echo $this->HTML->link($transaction['Transaction']['id'], array('controller' => 'transactions', 'action' => 'view', $transaction['Transaction']['id'])); ?></td>
            <td><?php echo $this->HTML->link($transaction['Transaction']['wallet_id'], array('controller' => 'transactions', 'action' => 'view', $transaction['Transaction']['id'])); ?></td>

            <td><?php echo $this->HTML->link($transaction['Wallet']['name'], array('controller' => 'transactions', 'action' => 'view', $transaction['Transaction']['id'])); ?></td>
        </tr>
        <?php
    endforeach;
    unset($transaction);
    ?>
</table>