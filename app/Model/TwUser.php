<?php
App::uses('AppModel', 'Model');
/**
 * TwUser Model
 *
 * @property TwUser $TwUser
 * @property TwUser $TwUser
 */
class TwUser extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

// /**
//  * hasMany associations
//  *
//  * @var array
//  */
// 	public $hasMany = array(
// 		'TwUser' => array(
// 			'className' => 'TwUser',
// 			'foreignKey' => 'tw_user_id',
// 			'dependent' => false,
// 			'conditions' => '',
// 			'fields' => '',
// 			'order' => '',
// 			'limit' => '',
// 			'offset' => '',
// 			'exclusive' => '',
// 			'finderQuery' => '',
// 			'counterQuery' => ''
// 		)
// 	);

}
