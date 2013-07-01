<?php
App::uses('AppController', 'Controller');
/**
 * Follows Controller
 *
 * @property Follow $Follow
 */
class FollowsController extends AppController {

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
	public $components = array('Session');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Follow->recursive = 0;
		$this->set('follows', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Follow->id = $id;
		if (!$this->Follow->exists()) {
			throw new NotFoundException(__('Invalid %s', __('follow')));
		}
		$this->set('follow', $this->Follow->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Follow->create();
			if ($this->Follow->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('follow')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('follow')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		}
		$users = $this->Follow->User->find('list');
		$followedUsers = $this->Follow->FollowedUser->find('list');
		$this->set(compact('users', 'followedUsers'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Follow->id = $id;
		if (!$this->Follow->exists()) {
			throw new NotFoundException(__('Invalid %s', __('follow')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Follow->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('follow')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('follow')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		} else {
			$this->request->data = $this->Follow->read(null, $id);
		}
		$users = $this->Follow->User->find('list');
		$followedUsers = $this->Follow->FollowedUser->find('list');
		$this->set(compact('users', 'followedUsers'));
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
		$this->Follow->id = $id;
		if (!$this->Follow->exists()) {
			throw new NotFoundException(__('Invalid %s', __('follow')));
		}
		if ($this->Follow->delete()) {
			$this->Session->setFlash(
				__('The %s deleted', __('follow')),
				'alert',
				array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
				)
			);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(
			__('The %s was not deleted', __('follow')),
			'alert',
			array(
				'plugin' => 'TwitterBootstrap',
				'class' => 'alert-error'
			)
		);
		$this->redirect(array('action' => 'index'));
	}
}
