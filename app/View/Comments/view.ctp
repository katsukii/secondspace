<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Comment');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($comment['Comment']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('User'); ?></dt>
			<dd>
				<?php echo $this->Html->link($comment['User']['name'], array('controller' => 'users', 'action' => 'view', $comment['User']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Post'); ?></dt>
			<dd>
				<?php echo $this->Html->link($comment['Post']['title'], array('controller' => 'posts', 'action' => 'view', $comment['Post']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Content'); ?></dt>
			<dd>
				<?php echo h($comment['Comment']['content']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Check Flag'); ?></dt>
			<dd>
				<?php echo h($comment['Comment']['check_flag']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Date'); ?></dt>
			<dd>
				<?php echo h($comment['Comment']['date']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Comment')), array('action' => 'edit', $comment['Comment']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Comment')), array('action' => 'delete', $comment['Comment']['id']), null, __('Are you sure you want to delete # %s?', $comment['Comment']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Comments')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Comment')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Users')), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('User')), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Posts')), array('controller' => 'posts', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Post')), array('controller' => 'posts', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Agrees')), array('controller' => 'agrees', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Agree')), array('controller' => 'agrees', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Agrees')); ?></h3>
	<?php if (!empty($comment['Agree'])):?>
		<table class="table">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('User Id'); ?></th>
				<th><?php echo __('Post Id'); ?></th>
				<th><?php echo __('Comment Id'); ?></th>
				<th><?php echo __('Check Flag'); ?></th>
				<th><?php echo __('Created'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($comment['Agree'] as $agree): ?>
			<tr>
				<td><?php echo $agree['id'];?></td>
				<td><?php echo $agree['user_id'];?></td>
				<td><?php echo $agree['post_id'];?></td>
				<td><?php echo $agree['comment_id'];?></td>
				<td><?php echo $agree['check_flag'];?></td>
				<td><?php echo $agree['created'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'agrees', 'action' => 'view', $agree['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'agrees', 'action' => 'edit', $agree['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'agrees', 'action' => 'delete', $agree['id']), null, __('Are you sure you want to delete # %s?', $agree['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

	</div>
	<div class="span3">
		<ul class="nav nav-list">
			<li><?php echo $this->Html->link(__('New %s', __('Agree')), array('controller' => 'agrees', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
