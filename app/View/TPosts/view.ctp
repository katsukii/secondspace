<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('T Post');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($tPost['TPost']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('User Id'); ?></dt>
			<dd>
				<?php echo h($tPost['TPost']['user_id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Title'); ?></dt>
			<dd>
				<?php echo h($tPost['TPost']['title']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Content'); ?></dt>
			<dd>
				<?php echo h($tPost['TPost']['content']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Agree'); ?></dt>
			<dd>
				<?php echo h($tPost['TPost']['agree']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($tPost['TPost']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($tPost['TPost']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('T Post')), array('action' => 'edit', $tPost['TPost']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('T Post')), array('action' => 'delete', $tPost['TPost']['id']), null, __('Are you sure you want to delete # %s?', $tPost['TPost']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('T Posts')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('T Post')), array('action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

