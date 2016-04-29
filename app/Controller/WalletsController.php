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
            $this->Auth->allow('index');
        }

        public function index()
        {
            $data = $this->Wallet->find('all'); //Wallet is model, find('all') -> find all row
            $this->set('wallets', $data); // wallets: valuable name
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

            $data = $this->Wallet->findById($id);
            $this->set('wallet', $data);
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