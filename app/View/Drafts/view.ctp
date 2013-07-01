<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Draft');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($draft['Draft']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('User'); ?></dt>
			<dd>
				<?php echo $this->Html->link($draft['User']['name'], array('controller' => 'users', 'action' => 'view', $draft['User']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Title'); ?></dt>
			<dd>
				<?php echo h($draft['Draft']['title']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Content'); ?></dt>
			<dd>
				<?php echo h($draft['Draft']['content']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($draft['Draft']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($draft['Draft']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Draft')), array('action' => 'edit', $draft['Draft']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Draft')), array('action' => 'delete', $draft['Draft']['id']), null, __('Are you sure you want to delete # %s?', $draft['Draft']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Drafts')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Draft')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Users')), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('User')), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

