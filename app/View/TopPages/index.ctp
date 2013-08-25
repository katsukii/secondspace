<div class="row" style="padding-top:10px;">
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
				<input type="hidden" name="post_u_id" value="">
	        </form>
	    </div>
	</div>
	<!-- プロフィール -->
	<div id="profile" class="span4">
		<table class=" table table-bordered table-hover">
			<thead><tr><th>あなたのプロフィール</th></tr></thead>
			<tbody>
				<tr><td>
					<img width="40" height="40" src="<?php echo h($user['tw_profile_image_url']); ?>"> 
					<span style="line-height:45px;font-size:16px;padding-left:5px;"><strong><?php echo h($user['tw_name']);//ユーザーの名前?></strong></span>
					<p>
					<?php echo h($user['tw_description']);//自己紹介?>
					</p>
				</td></tr>
			</tbody>
		</table>
	</div>



</div>