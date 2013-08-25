<?php
App::uses('AppController', 'Controller');
/**
 * Drafts Controller
 *
 * @property Draft $Draft
 */
class TopPagesController extends AppController {
	// public $layout = 'bootstrap';
	public $uses = array('Post');
	public $helpers = array('InputText');
	public $paginate = array(
        'order' => array('created' => 'desc')
    );
	public function index() {
		// $posts = $this->Post->find('all', array('limit'=>20));
		$posts = $this->paginate('Post');
		var_dump($posts);
		$this->set(compact('posts'));
	}


}