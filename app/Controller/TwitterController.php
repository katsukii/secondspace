<?php
App::uses('AppController', 'Controller');
// App::import('Vendor', 'OAuth/OAuthClient'); 
App::import('Model','TwUser');
App::import('Model','User');
// App::import('Vendor', 'oauth', array('file' => 'OAuth'.DS.'oauth_consumer.php'));
class TwitterController extends AppController {
    public function beforeFilter() {
        $this->TwUser = new TwUser;
        $this->User = new User;
        $this->Auth->allow();
        parent::beforeFilter();   
    }

    public $components = array('TwitterKit.Twitter');


    public function twitter_add() {
        $this->redirect(array('action' => 'request_auth'));
    }

    public function twitter_login() {
        $this->redirect(array('action' => 'request_auth'));
    }

    public function request_auth() {
        //  twitterのOAuth用ログインURLにリダイレクト
        if ($this->Auth->user()) {
            $this->redirect('/');
        }
        if ($this->request->is('post')) {
            $this->redirect($this->Twitter->getAuthenticateUrl(null, false));            
        }
    }


    public function callback() {

        // check params
        if (!$this->Twitter->isRequested()) {
            $this->flash(__('invalid access.'), '/', 5);
            return;
        }

        // get token
        $this->Twitter->setTwitterSource('twitter');
        $accessToken = $this->Twitter->getAccessToken();

        if (is_string($accessToken)) {
            $this->flash(__('fail get access token.') . $token, '/', 5);
            return;
        }
        $userInfo = $this->Twitter->getUserInformation();

        //access_tokenとaccess_token_secretがDBに存在すればログイン
        $exist_tw_user = $this->TwUser->find('first', array('conditions' => array('tw_user_id' => $userInfo['id'])));
        

        if (isset($exist_tw_user['TwUser'])&& $exist_tw_user['TwUser']['user_id']) {
            //ログイン
            if($this->Auth->login($exist_tw_user['User'])) {
                $this->Session->setFlash(
                    __('ログインしました。', __('user')),
                    'alert',
                    array(
                        'plugin' => 'TwitterBootstrap',
                        'class' => 'alert-success'
                    )
                );
                $this->redirect('/');
            }
        }else {

            //新規ユーザー登録
            //ユーザー登録フォームに飛ばす
            $twitter_info = array(
                    'TwUser' => array(
                        'tw_user_id' => $userInfo['id'], 
                        'tw_screen_name' => $userInfo['screen_name'], 
                        'tw_profile_image_url' => $userInfo['profile_image_url'], 
                        'tw_name' => $userInfo['name'], 
                        'tw_description' => $userInfo['description'], 
                        'tw_access_token' => $accessToken['oauth_token'], 
                        'tw_access_token_secret' => $accessToken['oauth_token_secret'], 
                    )
                );
            $this->Session->write('twitter_info', $twitter_info);
            $this->redirect(array('controller' => 'users', 'action' => 'add'));

        }

        // // create save data
        // $data['User'] = array(
        //     'id' => $token['user_id'],
        //     'username' => $token['screen_name'],
        //     'password' => Security::hash($token['oauth_token']),
        //     'oauth_token' => $token['oauth_token'],
        //     'oauth_token_secret' => $token['oauth_token_secret'],
        // );

        // if (!$this->User->save($data)) {
        //     $this->flash(__('user not saved.'), 'login', 5);
        //     return;
        // }

        // $this->Auth->login($data);

        // // Redirect to Top
        // $this->redirect('/');
    }
}