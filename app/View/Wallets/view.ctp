<!-- Import controller Users and Categories -->
<?php
    App:: import('Controller', array('Users', 'Categories'));
?>
<!-- Content -->
<div class="col-sm-2 col-md-3"></div>
<div class="col-xs-12 col-sm-8 col-md-6">
    <!--Add button-->
    <div id="addButton">
        <!-- Colored FAB button -->
        <!-- <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
          <i class="material-icons">add</i>
        </button> -->
        <?php echo $this->form->button('<i class="material-icons">add</i>',array('controller'=>'Transactions', 'action'=>'add', $wallet['Wallet']['id'], 'class'=>'mdl-button mdl-js-button mdl-button--fab mdl-button--colored') ); ?>
    </div>

    <div id="header" class="bg-content">
        <div id="walletName">
            <h2><?php echo $wallet['Wallet']['name'];?></h2>
        </div>
        <div id="info" class="">
            <table class="table">
                <tr>
                    <td class="title">INCOME</td>
                    <td></td>
                </tr>
                <tr class="" style="border-bottom: solid 1px #cccccc">
                    <td class="title">EXPENSE</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="title">TOTAL</td>
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
        <div class="bg-content transaction">
            <table class="table">
                <tr style="border-bottom: solid 1px #cccccc">
                    <td class="categoryName"><?php echo $this->HTML->link($cateName['Category']['name'], array('controller'=>'transactions', 'action'=>'edit', $transaction['id'])); ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="date"><?php echo $transaction['date']; ?></td>
                    <td class="cost"><?php echo $transaction['cost']; ?></td>
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