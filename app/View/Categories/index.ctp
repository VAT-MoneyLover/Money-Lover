<h2 class="allWallets">Categories</h2>
<?php

?>
<!-- Content -->
<div class="col-sm-2 col-md-3"></div>
<div class="col-xs-12 col-sm-8 col-md-6">
    <!-- Add box -->

    <!--Add button-->
    <div id="addButton" class="">
        <a href="<?php echo BASE_PATH.'categories/add' ;?>">
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
            foreach ($categories as $category) {
                if (
                    ($category['Category']['wallet_id'] == 0 && $category['Category']['user_id'] == 0) || 
                    ($category['Category']['user_id'] == AuthComponent::user('id') && $category['Category']['wallet_id'] == AuthComponent::user('current_wallet_id'))
                    ) {
                    # code...
                
        ?>
                        <div class="bg-content transaction">
                            <ul class="list-group">
                                <li class="list-group-item wallet">
                                    <span class="walletName"><?php echo $this->HTML->link($category['Category']['name'], array('controller' => 'Categories', 'action' => 'view', $category['Category']['id']), array('class'=>'')); ?></span>
                                    
                                    <?php
                                        echo $this->HTML->link('', array('controller' => 'Categories', 'action' => 'edit', $category['Category']['id']), array('class'=>'glyphicon glyphicon-pencil'));
                                
                                    ?>
                                </li>            
                                <li class="list-group-item">
                                    <span class="title">Type</span>
                                    <span class="value"><?php 
                                        if ($category['Category']['type'] == 0) {
                                            echo '<span style="color: red;">Expense</span>';
                                        } else{
                                            echo '<span style="color: green;">Income</span>';
                                        }
                                    ?></span>
                                </li>
                            </ul>
                        </div>
        <?php    
                }
            }
        ?>
    </div>
</div>
