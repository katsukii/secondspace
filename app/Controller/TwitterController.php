<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'OAuth/OAuthClient'); 
App::import('Model','TwUser');

// App::import('Vendor', 'oauth', array('file' => 'OAuth'.DS.'oauth_consumer.php'));
class TwitterController extends AppController {

    private function createClient() {
        return new OAuthClient('aGw1eZ5nFcPG0hjR6HtNg', 'hBHOwGBTTbcZpBlkjuNBehPEAEICyaH2vBvaEiGOlEM');
    }

    public function request_auth() {
        $client = $this->createClient();
        $requestToken = $client->getRequestToken('https://twitter.com/oauth/request_token', 'http://alpha.secondspace.me/twitter/callback');
        $this->Session->write('twitter_request_token', $requestToken);
        $this->redirect('http://twitter.com/oauth/authorize?oauth_token='.$requestToken->key); // Redirect to Twitter
    }

    public function callback() {
        $client = $this->createClient();
        $token = $client->getAccessToken(
        'https://api.twitter.com/oauth/access_token',
        $this->Session->read('twitter_request_token')
        );// get request token from session and request access token.

        if($token != ''){
            $twitter = $client->get(
                $token->key,
                $token->secret,
                'http://api.twitter.com/1.1/account/verify_credentials.json',
                array()
            ); // get the userinformation（optional）
            $twitter = json_decode($twitter, true);
        }
        var_dump($twitter);
    }

    public function login() {
        $this->TwUser = new TwUser;
        var_dump($this->TwUser->find('all'));
    }

    public function register() {

    }
}