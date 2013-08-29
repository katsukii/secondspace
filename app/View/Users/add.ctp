<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('User', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend>新規ユーザー登録</legend>
				<?php
				if ($twitter_screen_name) echo $this->BootstrapForm->input('twitter_screen_name', array('label' => 'Twitterアカウント', 'readonly' => 'readonly', 'value' => $twitter_screen_name));
				echo $this->BootstrapForm->input('username', array('label' => 'ユーザーID(半角英数字)', 'placeholder' => 'userid', 'value' => $twitter_screen_name));
				echo $this->BootstrapForm->input('email', array('label' => 'メールアドレス', 'placeholder' => 'your@email.com'));
				echo $this->BootstrapForm->input('password', array('label' => 'パスワード', 'placeholder' => 'password'));
				echo $this->BootstrapForm->input('temppassword', array('label' => 'パスワード(確認用)' , 'type' => 'password', 'placeholder' => 'password'));
				?>
				<?php echo $this->BootstrapForm->submit(__('登録'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
</div>

<?php if (!$twitter_screen_name) : ?>
		<form method = "post" action = "<?php echo $this->Html->url(array('controller' => 'twitter', 'action' => 'request_auth')); ?>">

		<fieldset>
			<legend>Twitterで登録</legend>
		</fieldset>
		<p>1クリックでログインできるようになります。</p>
		<?php echo $this->BootstrapForm->end(__('Twitterで登録')); ?>
<?php endif;?>