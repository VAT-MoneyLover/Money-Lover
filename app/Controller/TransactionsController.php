<?php
/**
 * Created by PhpStorm.
 * User: Thái
 * Date: 4/9/2016
 * Time: 9:03 AM
 */
    class TransactionsController extends AppController{

        public $components = array('Flash');

        public function index(){
            $data = $this->Transaction->find('all');
            $this->set('transactions', $data);
        }

        public function add($id){
            if($this->request->is('post')){

                $this->Transaction->create();

                $this->request->data['Transaction']['wallet_id'] = $id;
                $this->request->data['Transaction']['user_id'] = AuthComponent::user('id');
                if($this->Transaction->save($this->request->data)){
                    $this->Flash->set('The transaction has been created!');
                    $this->redirect('/wallets/view/'.$id);
                }
            }

            $this->set('categories', $this->Transaction->Category->find('list', array('conditions'=>array('wallet_id'=> $id))));
        }

        public function view($id)
        {
            $data = $this->Transaction->findById($id);
            $this->set('transaction', $data);
        }

        public function edit($transaction_id){

            $data = $this->Transaction->findById($transaction_id);

            if ($this->request->is(array('post', 'put'))) {
                # code...
                $this->Transaction->id = $transaction_id;
                if ($this->Transaction->save($this->request->data)) {
                    # code...
                    $this->Flash->set('The transaction has been editted!');
                $this->redirect('index');
                }
            }
            $this->set('categories', $this->Transaction->Category->find('list', array('conditions'=>array('wallet_id'=> $data['Wallet']['id']))));
            $this->request->data = $data;
                
        }
    }