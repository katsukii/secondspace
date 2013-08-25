<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Agree $Agree
 * @property Comment $Comment
 * @property Draft $Draft
 * @property Follow $Follow
 * @property Post $Post
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';




	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
	    return true;
	}


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'required' => true, 'allowEmpty' => false,
				'message' => 'ユーザー名を入力して下さい'),
			'alpha' => array(
				'rule' => array('alphaNumeric'),
				'message' => 'ユーザー名は半角英数字で入力して下さい'),
			'unique_username' => array(
				'rule' => array('isUnique', 'username'),
				'message' => 'このユーザー名は既に使われています'),
			'username_min' => array(
				'rule' => array('minLength', '3'),
				'message' => '3文字以上で入力して下さい')),
		'email' => array(
			'isValid' => array(
				'rule' => 'email',
				'required' => true,
				'message' => '正しいメールアドレスを入力して下さい'),
			'isUnique' => array(
				'rule' => array('isUnique', 'email'),
				'message' => 'このメールアドレスは既に使われています')),
		'password' => array(
			'too_short' => array(
				'rule' => array('minLength', '6'),
				'message' => 'パスワードは6文字以上で設定して下さい'),
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'パスワードを入力して下さい')),
		'temppassword' => array(
			'rule' => 'confirmPassword',
			'message' => 'パスワードが一致しません。もう一度入力して下さい')
	);



/**
 * Custom validation method to ensure that the two entered passwords match
 *
 * @param string $password Password
 * @return boolean Success
 */
	public function confirmPassword($password = null) {
		if ((isset($this->data[$this->alias]['password']) && isset($password['temppassword']))
			&& !empty($password['temppassword'])
			&& ($this->data[$this->alias]['password'] === $password['temppassword'])) {
			return true;
		}
		return false;
	}


	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Agree' => array(
			'className' => 'Agree',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Draft' => array(
			'className' => 'Draft',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Follow' => array(
			'className' => 'Follow',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
