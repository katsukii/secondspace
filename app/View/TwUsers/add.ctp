<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('TwUser', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('Add %s', __('Tw User')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('tw_user_id');
				echo $this->BootstrapForm->input('tw_screen_name');
				echo $this->BootstrapForm->input('tw_profile_image_url');
				echo $this->BootstrapForm->input('tw_name');
				echo $this->BootstrapForm->input('tw_description');
				echo $this->BootstrapForm->input('tw_access_token');
				echo $this->BootstrapForm->input('tw_access_token_secret');
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Tw Users')), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Tw Users')), array('controller' => 'tw_users', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Tw User')), array('controller' => 'tw_users', 'action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>