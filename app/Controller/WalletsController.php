<?php
/**
 * Created by PhpStorm.
 * User: Thái
 * Date: 4/5/2016
 * Time: 9:02 PM
 */
    App:: import('model', array('Transaction', 'Category'));

    class WalletsController extends AppController {

        public $components = array('Flash', 'Paginator');
        
        public function beforeFilter(){
            //$this->Auth->allow('index');
        }

        public function index()
        {
            $this->layout = 'main';
            if(!AuthComponent::user('current_wallet_id')){
                $data = $this->Wallet->find('all'); //Wallet is model, find('all') -> find all row
                $this->set('wallets', $data); // wallets: valuable name
            } else{
                $user = $this->Wallet->User->findById(AuthComponent::user('id'));
                $this->redirect(array('controller'=>'wallets', 'action'=>'view', $user['User']['current_wallet_id']));
            }
            
        }

        public function viewList(){
            $this->layout = 'main';
            $data = $this->Wallet->find('all');
            $this->set('wallets', $data);
        }

        public function add(){
            $this->layout = 'popup';
            if($this->request->is('post')){
                $this->Wallet->create(); // Wallet is model
                $this->request->data['Wallet']['user_id'] = AuthComponent::user('id');
                if($this->Wallet->save($this->request->data)){
                    $this->Flash->set('Wallet has been created!');
                    $this->redirect(BASE_PATH.'wallets/viewList');
                }
            }
        }
        //view by transaction
        public function viewDate($id){
            $this->layout = 'main';
            if($id){
                $data = $this->Wallet->findById($id);
            } else{
                $user = $this->Wallet->User->findById(AuthComponent::user('id'));
                $data = $this->Wallet->findById($user['User']['current_wallet_id']);
            }
            $this->set('wallet', $data);
            $this->Wallet->User->id = AuthComponent::user('id');
            $this->Wallet->User->saveField('current_wallet_id', $data['Wallet']['id']);
        }
        // View by category
        public function view($id){
            $this->layout = 'main';
            if($id){
                $data = $this->Wallet->findById($id);
            } else{
                $user = $this->Wallet->User->findById(AuthComponent::user('id'));
                $data = $this->Wallet->findById($user['User']['current_wallet_id']);
            }
            $this->set('wallet', $data);
            $this->Wallet->User->id = AuthComponent::user('id');
            $this->Wallet->User->saveField('current_wallet_id', $data['Wallet']['id']);
            $this->set('categories', $this->Wallet->Category->find('all'));
        }

        public function edit($id){
            $this->layout = 'popup';
            $data = $this->Wallet->findById($id);

            if($this->request->is(array('post', 'put'))){
                $this->Wallet->id = $id;
                if($this->Wallet->save($this->request->data)){
                    $this->Flash->set('The wallet has been editted!');
                    $this->redirect(BASE_PATH.'wallets/viewList');
                }
            }

            $this->request->data = $data;//fill old value in every field
            $this->set('wallet', $data);
        }

        public function delete($id){
            $this->Wallet->id = $id;

            if($this->request->is(array('post', 'put'))){
                if($this->Wallet->delete()){
                    $this->Flash->set('The wallet has been deleted!');
                    $this->redirect(BASE_PATH.'wallets/viewList');
                }
            }
        }

        public function transferMoney($id){
            $this->layout = 'popup'; 
            $this->Wallet->id = $id;
            $this->set('wallets', $this->Wallet->find('list', array('conditions'=>array('user_id'=>AuthComponent::user('id'), 'id !='=>AuthComponent::user('current_wallet_id')))));
            $this->set('wallet', $this->Wallet->findById($id));
            $this->set('categories', $this->Wallet->Category->find('list', array('conditions'=>array('wallet_id'=> array($id, '0'), 'type'=>0))));

            if ($this->request->is('post')) {
                // Set at 'destination wallet'
                $data = array(
                    // destination wallet
                    array(
                    'category_id'=> 5, // gift category's id. 
                    'wallet_id'=> $this->request->data['Transaction']['wallet_id'],
                    'user_id'=> AuthComponent::user('id'),
                    'cost' => $this->request->data['Transaction']['cost'],
                    'note' => 'Transfer from wallet '.$this->Wallet->findById($id)['Wallet']['name'],
                    'date' => $this->request->data['Transaction']['date']
                    ),
                    //from wallet
                    array(
                    'category_id'=> $this->request->data['Transaction']['category_id'],
                    'wallet_id'=> AuthComponent::user('current_wallet_id'),
                    'user_id'=> AuthComponent::user('id'),
                    'cost' => $this->request->data['Transaction']['cost'],
                    'note' => $this->request->data['Transaction']['note'],
                    'date' => $this->request->data['Transaction']['date']
                    ));
                if ($this->Wallet->Transaction->saveMany($data, array('deep' => true))) {
                    $this->redirect(BASE_PATH);
                }
            }
        }
    }