<!-- Import controller Users and Categories -->
<?php
    App:: import('Controller', array('Users', 'Categories'));
?>
<!-- Content -->
<div class="col-md-3 col-sm-2"></div>
<div class="col-md-6 col-sm-8">
    <!--Add button-->
        <div>
            <!-- Colored FAB button -->
            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
              <i class="material-icons">add</i>
          </button>
        </div>
    <div id="header" class="bg-content">
        <div id="walletName">
            <h2><?php echo $wallet['Wallet']['name'];?></h2>
        </div>
        <div id="info" class="">
            <table class="table">
                <tr>
                    <td class="title">Income</td>
                    <td></td>
                </tr>
                <tr class="" style="border-bottom: solid 1px #cccccc">
                    <td class="title">Expense</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="title">Total</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div><!--#header-->
    
    <div id="body" >
        
        <?php
            foreach($wallet['Transaction'] as $transaction){
                $categoriesController = new CategoriesController;
                $cateName = $categoriesController->getCategorynameById($transaction['category_id']);
        ?>
        <div class="bg-content">
            <table class="table">
                <tr style="border-bottom: solid 1px #cccccc">
                    <td><?php echo $this->HTML->link($cateName['Category']['name'], array('controller'=>'transactions', 'action'=>'edit', $transaction['id'])); ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td><?php echo $transaction['date']; ?></td>
                    <td><?php echo $transaction['cost']; ?></td>
                </tr>
            </table>
        </div>
        <?php 
            }
        ?>
    </div>
</div>



<!-- 
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
 -->