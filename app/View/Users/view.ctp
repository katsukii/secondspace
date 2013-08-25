<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('User');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($user['User']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Username'); ?></dt>
			<dd>
				<?php echo h($user['User']['username']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Email'); ?></dt>
			<dd>
				<?php echo h($user['User']['email']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Password'); ?></dt>
			<dd>
				<?php echo h($user['User']['password']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Role'); ?></dt>
			<dd>
				<?php echo h($user['User']['role']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($user['User']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($user['User']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('User')), array('action' => 'edit', $user['User']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('User')), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Users')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('User')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Agrees')), array('controller' => 'agrees', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Agree')), array('controller' => 'agrees', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Comments')), array('controller' => 'comments', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Comment')), array('controller' => 'comments', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Drafts')), array('controller' => 'drafts', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Draft')), array('controller' => 'drafts', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Follows')), array('controller' => 'follows', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Follow')), array('controller' => 'follows', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Posts')), array('controller' => 'posts', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Post')), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Agrees')); ?></h3>
	<?php if (!empty($user['Agree'])):?>
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
		<?php foreach ($user['Agree'] as $agree): ?>
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
	<?php if (!empty($user['Comment'])):?>
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
		<?php foreach ($user['Comment'] as $comment): ?>
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
<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Drafts')); ?></h3>
	<?php if (!empty($user['Draft'])):?>
		<table class="table">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('User Id'); ?></th>
				<th><?php echo __('Title'); ?></th>
				<th><?php echo __('Content'); ?></th>
				<th><?php echo __('Created'); ?></th>
				<th><?php echo __('Modified'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($user['Draft'] as $draft): ?>
			<tr>
				<td><?php echo $draft['id'];?></td>
				<td><?php echo $draft['user_id'];?></td>
				<td><?php echo $draft['title'];?></td>
				<td><?php echo $draft['content'];?></td>
				<td><?php echo $draft['created'];?></td>
				<td><?php echo $draft['modified'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'drafts', 'action' => 'view', $draft['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'drafts', 'action' => 'edit', $draft['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'drafts', 'action' => 'delete', $draft['id']), null, __('Are you sure you want to delete # %s?', $draft['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

	</div>
	<div class="span3">
		<ul class="nav nav-list">
			<li><?php echo $this->Html->link(__('New %s', __('Draft')), array('controller' => 'drafts', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Follows')); ?></h3>
	<?php if (!empty($user['Follow'])):?>
		<table class="table">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('User Id'); ?></th>
				<th><?php echo __('Followed User Id'); ?></th>
				<th><?php echo __('Check Flag'); ?></th>
				<th><?php echo __('Created'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($user['Follow'] as $follow): ?>
			<tr>
				<td><?php echo $follow['id'];?></td>
				<td><?php echo $follow['user_id'];?></td>
				<td><?php echo $follow['followed_user_id'];?></td>
				<td><?php echo $follow['check_flag'];?></td>
				<td><?php echo $follow['created'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'follows', 'action' => 'view', $follow['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'follows', 'action' => 'edit', $follow['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'follows', 'action' => 'delete', $follow['id']), null, __('Are you sure you want to delete # %s?', $follow['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

	</div>
	<div class="span3">
		<ul class="nav nav-list">
			<li><?php echo $this->Html->link(__('New %s', __('Follow')), array('controller' => 'follows', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Posts')); ?></h3>
	<?php if (!empty($user['Post'])):?>
		<table class="table">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('User Id'); ?></th>
				<th><?php echo __('Title'); ?></th>
				<th><?php echo __('Body'); ?></th>
				<th><?php echo __('Agree'); ?></th>
				<th><?php echo __('Created'); ?></th>
				<th><?php echo __('Modified'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($user['Post'] as $post): ?>
			<tr>
				<td><?php echo $post['id'];?></td>
				<td><?php echo $post['user_id'];?></td>
				<td><?php echo $post['title'];?></td>
				<td><?php echo $post['body'];?></td>
				<td><?php echo $post['agree'];?></td>
				<td><?php echo $post['created'];?></td>
				<td><?php echo $post['modified'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'posts', 'action' => 'view', $post['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'posts', 'action' => 'edit', $post['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'posts', 'action' => 'delete', $post['id']), null, __('Are you sure you want to delete # %s?', $post['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

	</div>
	<div class="span3">
		<ul class="nav nav-list">
			<li><?php echo $this->Html->link(__('New %s', __('Post')), array('controller' => 'posts', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
