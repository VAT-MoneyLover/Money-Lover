<?php
/**
 * Created by PhpStorm.
 * User: Thái
 * Date: 4/5/2016
 * Time: 9:02 PM
 */

    class WalletsController extends AppController {

        public $components = array('Flash');

        public function beforeFilter(){
            //$this->Auth->allow('index');
        }

        public function index()
        {
            if(!AuthComponent::user('current_wallet_id')){
                $data = $this->Wallet->find('all'); //Wallet is model, find('all') -> find all row
                $this->set('wallets', $data); // wallets: valuable name
            } else{
                $user = $this->Wallet->User->findById(AuthComponent::user('id'));
                $this->redirect(array('controller'=>'wallets', 'action'=>'view', $user['User']['current_wallet_id']));
            }
            
        }

        public function viewList(){
            $data = $this->Wallet->find('all');
            $this->set('wallets', $data);
        }

        public function add(){

            if($this->request->is('post')){

                $this->Wallet->create(); // Wallet is model
                $this->request->data['Wallet']['user_id'] = AuthComponent::user('id');
                $this->request->data['Wallet']['visible'] = 0;
                if($this->Wallet->save($this->request->data)){
                    $this->Flash->set('Wallet has been created!');
                    $this->redirect('index');
                }

            }
        }

        public function view($id){
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

        public function edit($id){

            $data = $this->Wallet->findById($id);

            if($this->request->is(array('post', 'put'))){
                $this->Wallet->id = $id;
                if($this->Wallet->save($this->request->data)){
                    $this->Flash->set('The wallet has been editted!');
                    $this->redirect('index');
                }
            }

            $this->request->data = $data;//fill old value in every field

        }

        public function delete($id){
            $this->Wallet->id = $id;

            if($this->request->is(array('post', 'put'))){
                if($this->Wallet->delete()){
                    $this->Flash->set('The wallet has been deleted!');
                    $this->redirect('index');
                }
            }
        }
    }