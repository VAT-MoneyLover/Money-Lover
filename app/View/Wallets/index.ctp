<h2 class="allWallets">All Wallets</h2>
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
                                <li class="list-group-item wallet">
                                    <span class="walletName"><?php echo $this->HTML->link($wallet['Wallet']['name'], array('controller' => 'Wallets', 'action' => 'view', $wallet['Wallet']['id']), array('class'=>'')); ?></span>
                                    <?php
                                        echo $this->HTML->link('', array('controller' => 'Wallets', 'action' => 'edit', $wallet['Wallet']['id']), array('class'=>'glyphicon glyphicon-pencil'));
                                
                                        /*echo $this->Form->postLink(
                                            $this->HTML->tag('span','',array('class'=>'glyphicon glyphicon-trash'))."", 
                                            array('controller' => 'Wallets', 'action' => 'delete', $wallet['Wallet']['id']),
                                            array('escape'=>false),__('Are you sure you want to delete?'),
                                            array('class'=>'btn btn-mini')
                                            );*/
                                    ?>
                                </li>            
                                <li class="list-group-item">
                                    <span class="title">Currency</span>
                                    <span class="value"><?php echo $wallet['Wallet']['currency']; ?></span>
                                </li>
                                <li class="list-group-item">
                                    <span class="title">Starting amount</span>
                                    <span class="value"><?php echo $wallet['Wallet']['starting_amount']; ?></span>
                                </li>
                            </ul>
                        </div>
        <?php    
                }
            }
        ?>
    </div>
</div>
