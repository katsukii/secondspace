<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->BootstrapForm->create('User'); ?>
    <fieldset>
        <legend><?php echo __('メールアドレスとパスワードでログイン'); ?></legend>
    <?php 
        echo $this->BootstrapForm->input('email', array('lagel' => 'メールアドレス'));
        echo $this->BootstrapForm->input('password', array('lagel' => 'パスワード'));
        echo $this->BootstrapForm->submit(__('ログイン'));?>
    </fieldset>
<?php echo $this->BootstrapForm->end(); ?>
</div>


<?php echo $this->BootstrapForm->create('TwUser', array('controller' => 'tw_users', 'action' => 'auth')); ?>
<fieldset>
	<legend>Twitterでログイン</legend>
</fieldset>
<?php echo $this->BootstrapForm->end(__('Twitterでログイン')); ?>