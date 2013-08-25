<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('User', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend>新規ユーザー登録</legend>
				<?php
				echo $this->BootstrapForm->input('username', array('label' => 'ユーザーID(半角英数字)'));
				echo $this->BootstrapForm->input('email', array('label' => 'メールアドレス'));
				echo $this->BootstrapForm->input('password', array('label' => 'パスワード'));
				echo $this->BootstrapForm->input('temppassword', array('label' => 'パスワード(確認用)' , 'type' => 'password'));
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
</div>