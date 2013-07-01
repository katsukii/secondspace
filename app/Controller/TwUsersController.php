<?php
App::uses('AppController', 'Controller');
/**
 * TwUsers Controller
 *
 * @property TwUser $TwUser
 */
class TwUsersController extends AppController {

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
		$this->TwUser->recursive = 0;
		$this->set('twUsers', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TwUser->id = $id;
		if (!$this->TwUser->exists()) {
			throw new NotFoundException(__('Invalid %s', __('tw user')));
		}
		$this->set('twUser', $this->TwUser->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TwUser->create();
			if ($this->TwUser->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('tw user')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('tw user')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		}
		$twUsers = $this->TwUser->TwUser->find('list');
		$this->set(compact('twUsers'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TwUser->id = $id;
		if (!$this->TwUser->exists()) {
			throw new NotFoundException(__('Invalid %s', __('tw user')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TwUser->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('tw user')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('tw user')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		} else {
			$this->request->data = $this->TwUser->read(null, $id);
		}
		$twUsers = $this->TwUser->TwUser->find('list');
		$this->set(compact('twUsers'));
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
		$this->TwUser->id = $id;
		if (!$this->TwUser->exists()) {
			throw new NotFoundException(__('Invalid %s', __('tw user')));
		}
		if ($this->TwUser->delete()) {
			$this->Session->setFlash(
				__('The %s deleted', __('tw user')),
				'alert',
				array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
				)
			);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(
			__('The %s was not deleted', __('tw user')),
			'alert',
			array(
				'plugin' => 'TwitterBootstrap',
				'class' => 'alert-error'
			)
		);
		$this->redirect(array('action' => 'index'));
	}
}
