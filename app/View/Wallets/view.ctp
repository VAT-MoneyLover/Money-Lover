<?php
    App:: import('Controller', array('Users', 'Categories'));
?>
<h1><?php echo $wallet['Wallet']['name']; ?></h1>
<?php

echo "Name: ". $wallet['Wallet']['name'] . "<br>";
echo "Currency: ". $wallet['Wallet']['currency']."<br>";

echo $this->HTML->link('Create a transaction in this wallet.', array('controller' => 'transactions', 'action' => 'add', $wallet['Wallet']['id']))."<br>";

echo $this->HTML->link('View list wallet.', array('controller'=>'wallets', 'action'=>'viewList'));
?>
<table>
    <tr>
        <td>No.</td>
        <td>Date</td>
        <td>Category Name</td>
        <td>Cost</td>
        <td>Note</td>
    </tr>

    <?php
        $counter = 1;
        foreach($wallet['Transaction'] as $transaction){

            $categoriesController = new CategoriesController;
            $cateName = $categoriesController->getCategorynameById($transaction['category_id']);

            echo "
            <tr>
                <td>".$counter."</td>
                <td>".$transaction['date']."</td>
                <td>".$this->HTML->link($cateName['Category']['name'], array('controller'=>'transactions', 'action'=>'edit', $transaction['id']))."</td>
                <td>".$transaction['cost'] ."</td>
                <td>".$transaction['note']."</td>
            </tr>";
            $counter++;
        }

    ?>
</table>
