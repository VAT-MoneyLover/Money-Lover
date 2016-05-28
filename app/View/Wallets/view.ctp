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
        
        foreach ($wallet['Transaction'] as $Transaction) {
            # code...
            $Category = $categoriesController->getCategoryById($Transaction['category_id']);
            if ($Category['Category']['type'] == 0) {
                # code...
                $expense += $Transaction['cost'];
            } else if ($Category['Category']['type'] == 1) {
                $income += $Transaction['cost'];
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
            foreach ($wallet['Category'] as $Category) {
        ?>
                        <div class="bg-content transaction">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="categoryName"><?php echo $Category['name']; ?></span>
                                    <span></span>
                                </li>
        <?php
                foreach ($wallet['Transaction'] as $Transaction) {
                    if ($Transaction['category_id'] == $Category['id']) {
        ?>                      
                                <li class="list-group-item">
                                    <a href="<?php echo BASE_PATH.'transactions/edit/'.$Transaction['id'];?>">
                                        <span class="date "><?php echo $Transaction['date']; ?></span>
                                        <span class="cost <?php  if($Category['type']==0) echo 'expense'; else echo'income'; ?>"><?php echo $Transaction['cost']; ?></span>
                                    </a>
                                </li>
        <?php
                    }
                }
        ?>

                            </ul>
                        </div>
        <?php    
            }
        ?>
    </div>
</div>