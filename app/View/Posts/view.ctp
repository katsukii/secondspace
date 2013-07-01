<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Post');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($post['Post']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('User'); ?></dt>
			<dd>
				<?php echo $this->Html->link($post['User']['name'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Title'); ?></dt>
			<dd>
				<?php echo h($post['Post']['title']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Content'); ?></dt>
			<dd>
				<?php echo h($post['Post']['content']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Agree'); ?></dt>
			<dd>
				<?php echo h($post['Post']['agree']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($post['Post']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($post['Post']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Post')), array('action' => 'edit', $post['Post']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Post')), array('action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Posts')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Post')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Users')), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('User')), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Agrees')), array('controller' => 'agrees', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Agree')), array('controller' => 'agrees', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Comments')), array('controller' => 'comments', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Comment')), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Agrees')); ?></h3>
	<?php if (!empty($post['Agree'])):?>
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
		<?php foreach ($post['Agree'] as $agree): ?>
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
<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Comments')); ?></h3>
	<?php if (!empty($post['Comment'])):?>
		<table class="table">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('User Id'); ?></th>
				<th><?php echo __('Post Id'); ?></th>
				<th><?php echo __('Content'); ?></th>
				<th><?php echo __('Check Flag'); ?></th>
				<th><?php echo __('Date'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($post['Comment'] as $comment): ?>
			<tr>
				<td><?php echo $comment['id'];?></td>
				<td><?php echo $comment['user_id'];?></td>
				<td><?php echo $comment['post_id'];?></td>
				<td><?php echo $comment['content'];?></td>
				<td><?php echo $comment['check_flag'];?></td>
				<td><?php echo $comment['date'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'comments', 'action' => 'view', $comment['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'comments', 'action' => 'edit', $comment['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comments', 'action' => 'delete', $comment['id']), null, __('Are you sure you want to delete # %s?', $comment['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

	</div>
	<div class="span3">
		<ul class="nav nav-list">
			<li><?php echo $this->Html->link(__('New %s', __('Comment')), array('controller' => 'comments', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
