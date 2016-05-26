<?php
    App:: import('Controller', array('Users', 'Categories'));
    $categoriesController = new CategoriesController;
    
?>
<!-- Content -->
<div class="col-sm-2 col-md-3"></div>
<div class="col-xs-12 col-sm-8 col-md-6">
    <!-- Add box -->

    <!--Add button-->
    <div id="addButton" class="">
        <a href="<?php echo BASE_PATH.'transactions/add/'.$wallet['Wallet']['id'] ;?>">
            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
                <i class="material-icons">add</i>
            </button>
        </a>
    </div>
    <!-- execute income, expense and total -->
    <?php 
        $income = 0; 
        $expense = 0;
        
        foreach ($wallet['Transaction'] as $transaction) {
            # code...
            $category = $categoriesController->getCategoryById($transaction['category_id']);
            if ($category['Category']['type'] == 0) {
                # code...
                $expense += $transaction['cost'];
            } else if ($category['Category']['type'] == 1) {
                $income += $transaction['cost'];
            }
        }
    ?>
    <!-- #header : consist wallet's name, income, expense  -->
    <div id="header" class="bg-content">
        <div id="walletName">
            <h2><?php echo $wallet['Wallet']['name'];?></h2>
        </div>
        <div id="info" class="">
            <table class="table">
                <tr>
                    <td class="title">INCOME</td>
                    <td class="cost income"><?php echo $income; ?></td>
                </tr>
                <tr class="" style="border-bottom: solid 1px #cccccc">
                    <td class="title">EXPENSE</td>
                    <td class="cost expense"><?php echo $expense; ?></td>
                </tr>
                <tr>
                    <td class="title"></td>
                    <td class="cost"><?php echo $income - $expense; ?></td>
                </tr>
            </table>
        </div>
    </div><!--#header-->
    <!-- #body -->
    <div id="body" >
        
        <?php
            foreach($wallet['Transaction'] as $transaction){
                $category = $categoriesController->getCategoryById($transaction['category_id']); 
        ?>
        <div class="bg-content transaction">
            <table class="table">
                <tr style="border-bottom: solid 1px #cccccc">
                    <td class="categoryName"><?php echo $this->HTML->link($category['Category']['name'], array('controller'=>'transactions', 'action'=>'edit', $transaction['id'])); ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="date"><?php echo $transaction['date']; ?></td>
                    <td class="cost <?php  if($category['Category']['type']==0) echo 'expense'; else echo'income'; ?>"><?php echo $transaction['cost']; ?></td>
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
            $category = $categoriesController->getCategoryById($transaction['category_id']);

            echo "
            <tr>
                <td>".$counter."</td>
                <td>".$transaction['date']."</td>
                <td>".$this->HTML->link($category['Category']['name'], array('controller'=>'transactions', 'action'=>'edit', $transaction['id']))."</td>
                <td>".$transaction['cost'] ."</td>
                <td>".$transaction['note']."</td>
            </tr>";
            $counter++;
        }

    ?>
</table>
 -->