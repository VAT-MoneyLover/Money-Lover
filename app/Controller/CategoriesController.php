<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 */
class CategoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index($id) {
		$this->layout = 'main';
		$this->Category->recursive = 0;
		$this->set('categories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'popup';
		if ($this->request->is('post')) {
			$this->Category->create();
			$this->Category->data['Category']['user_id'] = AuthComponent::user('id');
			if ($this->Category->save($this->request->data)) {
				$this->Flash->success(__('The category has been saved.'));
				return $this->redirect(BASE_PATH.'transactions/add/'.AuthComponent::user('current_wallet_id'));
			} else {
				$this->Flash->error(__('The category could not be saved. Please, try again.'));
			}
		}
		$wallets = $this->Category->User->Wallet->find('list', array('conditions'=> array('user_id'=> AuthComponent::user('id'))));

		$this->set(compact('wallets', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = 'popup';
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->Category->id = $id;
			if ($this->Category->save($this->request->data)) {
				$this->Flash->success(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
		$wallets = $this->Category->Wallet->find('list');
		$users = $this->Category->User->find('list');
		$this->set(compact('wallets', 'users'));
		$this->set('category', $this->Category->findById($id));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Category->delete()) {
			$this->Flash->success(__('The category has been deleted.'));
		} else {
			$this->Flash->error(__('The category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function getCategoryById($id){
		$data = $this->Category->findById($id);
		return $data;
	}
	public function gerCategorytypeById($id){

	}
}
