<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Tw User');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($twUser['TwUser']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Tw User'); ?></dt>
			<dd>
				<?php echo $this->Html->link($twUser['TwUser']['id'], array('controller' => 'tw_users', 'action' => 'view', $twUser['TwUser']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Tw Screen Name'); ?></dt>
			<dd>
				<?php echo h($twUser['TwUser']['tw_screen_name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Tw Profile Image Url'); ?></dt>
			<dd>
				<?php echo h($twUser['TwUser']['tw_profile_image_url']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Tw Name'); ?></dt>
			<dd>
				<?php echo h($twUser['TwUser']['tw_name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Tw Description'); ?></dt>
			<dd>
				<?php echo h($twUser['TwUser']['tw_description']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Tw Access Token'); ?></dt>
			<dd>
				<?php echo h($twUser['TwUser']['tw_access_token']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Tw Access Token Secret'); ?></dt>
			<dd>
				<?php echo h($twUser['TwUser']['tw_access_token_secret']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($twUser['TwUser']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($twUser['TwUser']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Tw User')), array('action' => 'edit', $twUser['TwUser']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Tw User')), array('action' => 'delete', $twUser['TwUser']['id']), null, __('Are you sure you want to delete # %s?', $twUser['TwUser']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Tw Users')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Tw User')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Tw Users')), array('controller' => 'tw_users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Tw User')), array('controller' => 'tw_users', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Tw Users')); ?></h3>
	<?php if (!empty($twUser['TwUser'])):?>
		<table class="table">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('Tw User Id'); ?></th>
				<th><?php echo __('Tw Screen Name'); ?></th>
				<th><?php echo __('Tw Profile Image Url'); ?></th>
				<th><?php echo __('Tw Name'); ?></th>
				<th><?php echo __('Tw Description'); ?></th>
				<th><?php echo __('Tw Access Token'); ?></th>
				<th><?php echo __('Tw Access Token Secret'); ?></th>
				<th><?php echo __('Created'); ?></th>
				<th><?php echo __('Modified'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($twUser['TwUser'] as $twUser): ?>
			<tr>
				<td><?php echo $twUser['id'];?></td>
				<td><?php echo $twUser['tw_user_id'];?></td>
				<td><?php echo $twUser['tw_screen_name'];?></td>
				<td><?php echo $twUser['tw_profile_image_url'];?></td>
				<td><?php echo $twUser['tw_name'];?></td>
				<td><?php echo $twUser['tw_description'];?></td>
				<td><?php echo $twUser['tw_access_token'];?></td>
				<td><?php echo $twUser['tw_access_token_secret'];?></td>
				<td><?php echo $twUser['created'];?></td>
				<td><?php echo $twUser['modified'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'tw_users', 'action' => 'view', $twUser['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'tw_users', 'action' => 'edit', $twUser['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tw_users', 'action' => 'delete', $twUser['id']), null, __('Are you sure you want to delete # %s?', $twUser['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

	</div>
	<div class="span3">
		<ul class="nav nav-list">
			<li><?php echo $this->Html->link(__('New %s', __('Tw User')), array('controller' => 'tw_users', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
