<?php
define('FACEBOOK_SDK_V4_SRC_DIR','../Vendor/FabeBook/src/Facebook/');
require_once("../Vendor/Facebook/autoload.php");
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\GraphSessionInfo;

App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	//new code google oath
	/**
 * This function will makes Oauth Api reqest
 */
	public $components = array('Paginator');

	public function beforeFilter(){
		//$this->Auth->allow('add');
		$this->Auth->allow('add', 'google_login', 'googlelogin', 'forgotPassword' );
		parent::beforeFilter();
	}

	public function forgotPassword(){
		//$this->layout('login');
		if( !empty( $this->request->data ) ){
				$email =  $this->request->data['User']['email'];
				$password = $this->randomPassword();
				$password1 = $this->Auth->password( $password );
				$this->User->query("UPDATE users SET password = '$password1' WHERE email = '$email'");
				$to = $email;
				$subject = "New Password Request";
				$txt = "Your New Password: ".$password;
				$headers = "From: thaibm.uet@gmail.com";
				
				if( mail($to,$subject,$txt,$headers) ){
					$this->Session->setFlash(FORGET_PASSWORD_SUCCESS, 'default', array( 'class' => 'message error'), 'success' );
					$this->redirect(BASE_PATH.'users/login');
				}else{
					$this->Flash->error(FORGET_PASSWORD_FAILURE, 'default', array( 'class' => 'message error'), 'error' );
					$this->redirect(BASE_PATH.'users/forgotPassword');
				}
			}
	}

	public function randomPassword(){
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array();
		$alphabetLength = strlen($alphabet) - 1;
		for($i = 0; $i<8; $i++){
			$n = rand(0, $alphabetLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass);
	}

	public function changePassword($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->User->id = $id;
			$data = $this->User->findById($id);
			$newData = $this->request->data;
			$newData['User']['old_password'] = AuthComponent::password($newData['User']['old_password']);
			$newData['User']['new_password'] = AuthComponent::password($newData['User']['new_password']);
				// $newData['User']['confirm_password'] = AuthComponent::password($newData['User']['confirm_password']);
			if ($data['User']['password'] == $newData['User']['old_password']) {
					# code...
				if ($this->User->saveField('password', $newData['User']['new_password'])) {
					$this->Flash->success(__('The user has been saved.'));
					// return $this->redirect(array('action' => 'index'));
				} else {
					$this->Flash->error(__('The user could not be saved. Please, try again.'));
				}
			}else {
				$this->Flash->error(__('Invalid. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}
	public function avatar($id){

		if ($this->request->is('post', 'put')) {

			$this->User->id = $id;
			$avatar = $this->request->data['avatar'];
			$folderToSaveFile = APP . WEBROOT_DIR . DS . 'files' . DS;
			if($this->User->findById($id)['User']['avatar']){
				unlink($this->User->findById($id)['User']['avatar']);
				$this->User->saveField('avatar', 0);
			}
			if(move_uploaded_file($avatar['tmp_name'], $folderToSaveFile. $avatar["name"])){
				if ($this->User->saveField('avatar', $folderToSaveFile . $avatar['name'])) {
				# code...
					$this->Flash->set('Changed avatar successfully!');
				}else{
					$this->Flash->set('Error!');
				}
			}

		}
	}


	public function getEmailById($id){
		$data = $this->User->findById($id);
		return $data;
	}

	public function logout(){
		$this->Auth->logout();
		$this->redirect('index');
	}
	public function login(){
		if ($this->request->is('post')) {
				# code...
			if ($this->Auth->login()) {
					# code...
				return $this->redirect($this->Auth->redirectUrl(BASE_PATH));
			} else{
				$this->Flash->error('Invalid Email and Password!');
			}
		}
	}

public function add() {
	if ($this->request->is('post')) {
		$this->User->create();
		$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
		if ($this->User->save($this->request->data)) {
			$this->Flash->success(__('The user has been saved.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Flash->error(__('The user could not be saved. Please, try again.'));
		}
	}
}

public function index() {
	//$this->layout = 'index';
	$this->User->recursive = 0;
	$this->set('users', $this->Paginator->paginate());
}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function view($id = null) {
	if (!$this->User->exists($id)) {
		throw new NotFoundException(__('Invalid user'));
	}
	$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
	$this->set('user', $this->User->find('first', $options));
}



/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function edit($id){

}


/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function delete($id = null) {
	$this->User->id = $id;
	if (!$this->User->exists()) {
		throw new NotFoundException(__('Invalid user'));
	}
	$this->request->allowMethod('post', 'delete');
	if ($this->User->delete()) {
		$this->Flash->success(__('The user has been deleted.'));
	} else {
		$this->Flash->error(__('The user could not be deleted. Please, try again.'));
	}
	return $this->redirect(array('action' => 'index'));
}

public function googlelogin()
{
	$this->autoRender = false;
	require_once '../Config/google_login.php';
	$client = new Google_Client();
	$client->setScopes(array('https://www.googleapis.com/auth/plus.login','https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me'));
	$client->setApprovalPrompt('auto');
	$url = $client->createAuthUrl();
	$this->redirect($url);
}

/**
 * This function will handle Oauth Api response
 */

public function google_login()
{
	$this->autoRender = false;
	require_once '../Config/google_login.php';
	$client = new Google_Client();
	$client->setScopes(array('https://www.googleapis.com/auth/plus.login','https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me'));
	$client->setApprovalPrompt('auto');

	$plus       = new Google_PlusService($client);
	$oauth2     = new Google_Oauth2Service($client);
	if(isset($_GET['code'])) {
		$client->authenticate(); // Authenticate
		$_SESSION['access_token'] = $client->getAccessToken(); // get the access token here
	}

	if(isset($_SESSION['access_token'])) {
		$client->setAccessToken($_SESSION['access_token']);
	}

	if ($client->getAccessToken()) {
		$_SESSION['access_token'] = $client->getAccessToken();
		$user         = $oauth2->userinfo->get();
		try {
			if(!empty($user)){
				$result = $this->User->findByEmail( $user['email'] );
				if(!empty( $result )){
					if($this->Auth->login($result['User'])){
						$this->Session->setFlash(GOOGLE_LOGIN_SUCCESS, 'default', array( 'class' => 'message success'), 'success' );
						$this->redirect(BASE_PATH);
					}else{
						$this->Session->setFlash(GOOGLE_LOGIN_FAILURE, 'default', array( 'class' => 'message error'), 'error' );
						$this->redirect(BASE_PATH.'login');
					}

				}else{
					$data = array();
					$data['email'] = $user['email'];
					/*$data['first_name'] = $user['given_name'];
					$data['last_name'] = $user['family_name'];
					$data['social_id'] = $user['id'];*/
					$data['avatar'] = $user['picture'];
					/*$data['gender'] = $user['gender'] == 'male' ? 'm':'f';
					$data['user_level_id'] = 1;
					$data['uuid'] = String::uuid();*/
					$this->User->save( $data );
					if($this->User->save( $data )){
						$data['id'] = $this->User->getLastInsertID();
						if($this->Auth->login($data)){
							$this->Session->setFlash(GOOGLE_LOGIN_SUCCESS, 'default', array( 'class' => 'message success'), 'success' );
							$this->redirect(BASE_PATH);
						}else{
							$this->Session->setFlash(GOOGLE_LOGIN_FAILURE, 'default', array( 'class' => 'message error'), 'error' );
							$this->redirect(BASE_PATH.'login');
						}

					}else{
						$this->Session->setFlash(GOOGLE_LOGIN_FAILURE, 'default', array( 'class' => 'message error'), 'error' );
						$this->redirect(BASE_PATH.'login');
					}
				}

			}else{
				$this->Session->setFlash(GOOGLE_LOGIN_FAILURE, 'default', array( 'class' => 'message error'), 'error' );
				$this->redirect(BASE_PATH.'login');
			}
		}catch (Exception $e) {
			$this->Session->setFlash(GOOGLE_LOGIN_FAILURE, 'default', array( 'class' => 'message error'), 'error' );
			$this->redirect(BASE_PATH.'login');
		}
	}

	exit;
}

/*public function fblogin()
{
	$this->autoRender = false;
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	FacebookSession::setDefaultApplication(FACEBOOK_APP_ID, FACEBOOK_APP_SECRET);
	$helper = new FacebookRedirectLoginHelper(FACEBOOK_REDIRECT_URI);
	$url = $helper->getLoginUrl(array('email'));
	$this->redirect($url);
}

public function fb_login()
{
	$this->layout = 'ajax'; 
	FacebookSession::setDefaultApplication(FACEBOOK_APP_ID, FACEBOOK_APP_SECRET);
	$helper = new FacebookRedirectLoginHelper(FACEBOOK_REDIRECT_URI);
	$session = $helper->getSessionFromRedirect();

	if(isset($_SESSION['token'])){
		$session = new FacebookSession($_SESSION['token']);
		try{
			$session->validate(FACEBOOK_APP_ID, FACEBOOK_APP_SECRET);
		}catch(FacebookAuthorizationException $e){
			echo $e->getMessage();
		}
	}

	$data = array();
	$fb_data = array();

	if(isset($session)){
		$_SESSION['token'] = $session->getToken();
		$request = new FacebookRequest($session, 'GET', '/me');
		$response = $request->execute();
		$graph = $response->getGraphObject(GraphUser::className());

		$fb_data = $graph->asArray();
		$id = $graph->getId();
		$image = "https://graph.facebook.com/".$id."/picture?width=100";
			
		if( !empty( $fb_data )){
			$result = $this->User->findByEmail( $fb_data['email'] );
			if(!empty( $result )){
				if($this->Auth->login($result['User'])){
					$this->Session->setFlash(FACEBOOK_LOGIN_SUCCESS, 'default', array( 'class' => 'message success'), 'success' );
					$this->redirect(BASE_PATH);
				}else{
					$this->Session->setFlash(FACEBOOK_LOGIN_FAILURE, 'default', array( 'class' => 'message error'), 'error' );
					$this->redirect(BASE_PATH.'login');
				}
					
			}else{
				$data['email'] = $fb_data['email'];
				//$data['name'] = $fb_data['first_name'];
				//$data['social_id'] = $fb_data['id'];
				$data['avatar'] = $image;
				//$data['uuid'] = String::uuid ();
				$this->User->save( $data );
				if($this->User->save( $data )){
					$data['id'] = $this->User->getLastInsertID();
					if($this->Auth->login($data)){
						$this->Session->setFlash(FACEBOOK_LOGIN_SUCCESS, 'default', array( 'class' => 'message success'), 'success' );
						$this->redirect(BASE_PATH);
					}else{
						$this->Session->setFlash(FACEBOOK_LOGIN_FAILURE, 'default', array( 'class' => 'message error'), 'error' );
						$this->redirect(BASE_PATH.'index');
					}

				}else{
					$this->Session->setFlash(FACEBOOK_LOGIN_FAILURE, 'default', array( 'class' => 'message error'), 'error' );
					$this->redirect(BASE_PATH.'index');
				}
			}




		}else{
			$this->Session->setFlash(FACEBOOK_LOGIN_FAILURE, 'default', array( 'class' => 'message error'), 'error' );
			$this->redirect(BASE_PATH.'index');
		}
			
			
	}
}*/

}
