<div class="row-fluid">
	<!-- <div class="span9"> -->
			<!-- テキストフィールド -->
	<div id="post_area" class="span8 clearfix">
	    <label for="textarea">あなたの思考を300字以上で投稿してください。</label>
	    <div class="input">
	    	<form method="POST" action="post_action.php">
	    		<input type = "text" id="title_text" name="post_title" class="span8" value="" placeholder="タイトル">
		        <textarea class="xxlarge span8" id="post_textarea" name="post_text" rows="4" maxlength="2000" placeholder="本文(300字以上で公開できます)"></textarea>
		        <span id="post_textarea_cd">300</span>
		        <div class="control-group">
		    		<div class="controls">
		    			<input type="submit" value="下書き保存" name="save_btn" class="btn">
		    			<input type="submit" value="公開" name="post_btn" class="btn">
			    	</div>
				</div>
				<input type="hidden" name="post_u_id" value="<?php echo $u_id;?>">
	        </form>
	    </div>
	</div>
	<!-- プロフィール -->
	<div id="profile" class="span4 table-bordered">
		<h2>あなたのプロフィール</h2>
		<div id="profile-contents-group">
			<div class="content">
				<div class="">
					<a href="#katsukii" class="">
						<img class="" width="40" height="40" src="https://si0.twimg.com/profile_images/1131463678/katsuki_normal.jpg" alt="香月雄介">
						<span style="line-height:45px;font-size:16px;padding-left:5px;"><strong><?php echo "香月雄介"//h($user['tw_name']);//ユーザーの名前?></strong></span>
					</a>
				</div>
				<p>
				<?php echo "自己紹介"//h($user['tw_description']);//自己紹介?>
				</p>
			</div>
			
		</div>
		<div class="js-mini-profile-stats-container">

		</div>
	</div>

	<div id="profile" class="span4">
		<table class=" table table-bordered table-hover">
			<thead><tr><th>あなたのプロフィール</th></tr></thead>
			<tbody>
				<tr><td>
					<img width="40" height="40" src="<?php echo h($user['tw_profile_image_url']); ?>"> 
					
					
				</td></tr>
			</tbody>
		</table>
	</div>
</div>



<!-- 		<p>
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
		<?php foreach ($posts as $post): ?>
			<tr>
				<td><?php echo h($post['Post']['id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($post['User']['name'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
				</td>
				<td><?php echo h($post['Post']['title']); ?>&nbsp;</td>
				<td><?php echo h($post['Post']['content']); ?>&nbsp;</td>
				<td><?php echo h($post['Post']['agree']); ?>&nbsp;</td>
				<td><?php echo h($post['Post']['created']); ?>&nbsp;</td>
				<td><?php echo h($post['Post']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
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
			<li><?php echo $this->Html->link(__('New %s', __('Post')), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Users')), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('User')), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Agrees')), array('controller' => 'agrees', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Agree')), array('controller' => 'agrees', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Comments')), array('controller' => 'comments', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Comment')), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
 -->