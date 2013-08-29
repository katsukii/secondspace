<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'OAuth/OAuthClient'); 
App::import('Model','TwUser');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

/**
 *  Layout
 *
 * @var string
 */
	public $layout = 'bootstrap';

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('TwitterBootstrap.BootstrapHtml', 'TwitterBootstrap.BootstrapForm', 'TwitterBootstrap.BootstrapPaginator');
/**
 * Components
 *
 * @var array
 */

	public function beforeFilter() {
    	$this->Auth->allow('login', 'add');
    	parent::beforeFilter();	
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid %s', __('user')));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->Auth->user()) {
			$this->redirect('/');
		}
		$twitter_info = null;
		$twitter_info = $this->Session->read('twitter_info');
		$this->Session->delete('twitter_info');
		if ($this->request->is('post')) {

            //Twitter情報とひもづいている場合のユーザー登録
            if ($twitter_info) {
            	//新規ユーザー登録(twitter情報も含む)
	            $user_savedata['User'] = $this->request->data['User'];
	            $user_savedata['TwUser'] = $twitter_info['TwUser'];
	            //保存
	            if($this->User->saveAssociated($user_savedata)) {
		            $this->Auth->login($this->request->data['User']);
		            $this->Session->setFlash(
		                __('ユーザー登録が完了しました。', __('user')),
		                'alert',
		                array(
		                    'plugin' => 'TwitterBootstrap',
		                    'class' => 'alert-success'
		                )
		            );
		            $this->redirect('/');
	            } else {
	            	$this->Session->setFlash(
		                __('入力項目を確認してください', __('user')),
		                'alert',
		                array(
		                    'plugin' => 'TwitterBootstrap',
		                    'class' => 'alert-error'
		                )
		            );
	            }
            }

            //通常のユーザー登録
            $this->User->create();
			if ($this->User->save($this->request->data)) {
	            $this->Auth->login($this->request->data['User']);
	            $this->Session->setFlash(
	                __('ユーザー登録が完了しました。', __('user')),
	                'alert',
	                array(
	                    'plugin' => 'TwitterBootstrap',
	                    'class' => 'alert-success'
	                )
	            );
	            $this->redirect('/');
            } else {
            	$this->Session->setFlash(
         	       __('入力項目を確認してください', __('user')),
	                'alert',
	                array(
	                    'plugin' => 'TwitterBootstrap',
	                    'class' => 'alert-error'
	                )
	            );
	        }
		}
		//レンダリング
		$twitter_screen_name = null;
		if ($twitter_info) {
			$this->Session->setFlash(
                __('このTwitterアカウントと連携したユーザーアカウントを作成します。', __('user')),
                'alert',
                array(
                    'plugin' => 'TwitterBootstrap',
                    'class' => 'alert-info'
                )
            );
			$twitter_screen_name = $twitter_info['TwUser']['tw_screen_name'];
		}
		$this->set(compact('twitter_screen_name'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid %s', __('user')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('user')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('user')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

	public function login() {
		if ($this->Auth->user()) {
			$this->redirect('/');
		}
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            $this->redirect($this->Auth->redirect());
	        } else {
	            $this->Session->setFlash(__('メールアドレスかパスワードが間違っています'), 
	            	'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
	            );
	        }
	    }
	}

	public function logout() {
	    $this->redirect($this->Auth->logout());
	}


/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid %s', __('user')));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(
				__('The %s deleted', __('user')),
				'alert',
				array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
				)
			);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(
			__('The %s was not deleted', __('user')),
			'alert',
			array(
				'plugin' => 'TwitterBootstrap',
				'class' => 'alert-error'
			)
		);
		$this->redirect(array('action' => 'index'));
	}


}
