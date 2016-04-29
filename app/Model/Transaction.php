<?php
/**
 * Created by PhpStorm.
 * User: Thái
 * Date: 4/9/2016
 * Time: 9:01 AM
 */
    class Transaction extends AppModel{

        public $belongsTo = array('Wallet', 'Category'); // belongs to Wallet model
    }