<?php
App::uses('AppController', 'Controller');
/**
 * Drafts Controller
 *
 * @property Draft $Draft
 */
class DraftsController extends AppController {

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
		$this->Draft->recursive = 0;
		$this->set('drafts', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Draft->id = $id;
		if (!$this->Draft->exists()) {
			throw new NotFoundException(__('Invalid %s', __('draft')));
		}
		$this->set('draft', $this->Draft->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Draft->create();
			if ($this->Draft->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('draft')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('draft')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		}
		$users = $this->Draft->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Draft->id = $id;
		if (!$this->Draft->exists()) {
			throw new NotFoundException(__('Invalid %s', __('draft')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Draft->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('draft')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('draft')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		} else {
			$this->request->data = $this->Draft->read(null, $id);
		}
		$users = $this->Draft->User->find('list');
		$this->set(compact('users'));
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
		$this->Draft->id = $id;
		if (!$this->Draft->exists()) {
			throw new NotFoundException(__('Invalid %s', __('draft')));
		}
		if ($this->Draft->delete()) {
			$this->Session->setFlash(
				__('The %s deleted', __('draft')),
				'alert',
				array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
				)
			);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(
			__('The %s was not deleted', __('draft')),
			'alert',
			array(
				'plugin' => 'TwitterBootstrap',
				'class' => 'alert-error'
			)
		);
		$this->redirect(array('action' => 'index'));
	}
}
