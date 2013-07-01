<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('T Posts'));?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('user_id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('title');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('content');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('agree');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('created');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('modified');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($tPosts as $tPost): ?>
			<tr>
				<td><?php echo h($tPost['TPost']['id']); ?>&nbsp;</td>
				<td><?php echo h($tPost['TPost']['user_id']); ?>&nbsp;</td>
				<td><?php echo h($tPost['TPost']['title']); ?>&nbsp;</td>
				<td><?php echo h($tPost['TPost']['content']); ?>&nbsp;</td>
				<td><?php echo h($tPost['TPost']['agree']); ?>&nbsp;</td>
				<td><?php echo h($tPost['TPost']['created']); ?>&nbsp;</td>
				<td><?php echo h($tPost['TPost']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $tPost['TPost']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tPost['TPost']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tPost['TPost']['id']), null, __('Are you sure you want to delete # %s?', $tPost['TPost']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>

		<?php echo $this->BootstrapPaginator->pagination(); ?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('T Post')), array('action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>