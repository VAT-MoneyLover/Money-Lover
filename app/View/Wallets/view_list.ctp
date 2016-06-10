<h2>All Wallets</h2>
<?php

?>
<!-- Content -->
<div class="col-sm-2 col-md-3"></div>
<div class="col-xs-12 col-sm-8 col-md-6">
    <!-- Add box -->

    <!--Add button-->
    <div id="addButton" class="">
        <a href="<?php echo BASE_PATH.'wallets/add' ;?>">
            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
                <i class="material-icons">add</i>
            </button>
        </a>
    </div>
    <!-- #header : consist wallet's name, income, expense  -->
    <div id="header" class="bg-content">
    </div><!--#header-->
    <!-- #body -->
    <div id="body" >      
        <?php
            foreach ($wallets as $wallet) {
                if ($wallet['User']['id'] == AuthComponent::user('id')){
        ?>
                        <div class="bg-content transaction">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="walletName"><?php echo $this->HTML->link($wallet['Wallet']['name'], array('controller' => 'Wallets', 'action' => 'view', $wallet['Wallet']['id'])); ?></span>
                                    <span></span>
                                </li>            
                                <li class="list-group-item">
                                    <a href="<?php echo BASE_PATH.'wallets/edit/'.$wallet['Wallet']['id'];?>">
                                        <span class=""><?php echo $wallet['Wallet']['currency']; ?></span>
                                        <span class=""><?php echo $wallet['Wallet']['starting_amount']; ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
        <?php    
                }
            }
        ?>
    </div>
</div>
