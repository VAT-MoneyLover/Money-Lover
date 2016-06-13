<?php
/**
 * Created by PhpStorm.
 * User: Thái
 * Date: 4/9/2016
 * Time: 9:03 AM
 */
    App:: import('model', array('Wallet', 'Category')); 

    class TransactionsController extends AppController{

        public $components = array('Flash');

        public function index(){
            $data = $this->Transaction->find('all');
            $this->set('transactions', $data);
        }

        public function add($id){
            $this->layout = 'popup';
            if($this->request->is('post')){

                $this->Transaction->create();

                $this->request->data['Transaction']['wallet_id'] = $id;
                $this->request->data['Transaction']['user_id'] = AuthComponent::user('id');
                if($this->Transaction->save($this->request->data)){
                    $this->Flash->set('The transaction has been created!');
                    $this->redirect('/wallets/view/'.$id);
                }
            }

            $this->set('categories', $this->Transaction->Category->find('list', array('conditions'=>array('wallet_id'=> array($id, 0)))));
        }

        public function view($id)
        {
            $data = $this->Transaction->findById($id);
            $this->set('transaction', $data);
        }

        public function edit($transaction_id){
            $this->layout = 'popup';
            $data = $this->Transaction->findById($transaction_id);

            if ($this->request->is(array('post', 'put'))) {
                # code...
                $this->Transaction->id = $transaction_id;
                if ($this->Transaction->save($this->request->data)) {
                    # code...
                    $this->Flash->set('The transaction has been editted!');
                $this->redirect(BASE_PATH);
                }
            }
            $this->set('categories', $this->Transaction->Category->find('list', array('conditions'=>array('wallet_id'=> $data['Wallet']['id']))));
            $this->request->data = $data;

            $this->set('transaction', $this->Transaction->findById($transaction_id));
        }
        public function delete($id){
            $this->Transaction->id = $id;
            if ($this->request->is(array('post','put'))) {
                # code...
                if ($this->Transaction->delete()) {
                    # code...
                    $this->Flash->set('The transaction has been deleted!');
                    $this->redirect(BASE_PATH);
                }
            }
        }
    }