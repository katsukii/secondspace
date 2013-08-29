<?php var_dump($auth_user);?>
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
					<?php echo $this->Html->Image($auth_user['profile_image_url'], array('alt' => 'You', 'width' => '40', 'height' => '40')); ?>
 
					<span style="line-height:45px;font-size:16px;padding-left:5px;">
						<strong>
							<?php 
							if($auth_user['name']){
								echo h($auth_user['name']);//ユーザーの名前
							}else{
								echo h($auth_user['username']);
							}
							?>
						</strong>
					</span>
					<p>
					<?php echo h($auth_user['profile_description']);//自己紹介?>
					</p>
				</td></tr>
			</tbody>
		</table>
	</div>

	<!-- タイムライン -->
	<div id="time_line" class="span8">
		<table class="table table-bordered table-hover">
			<thead><tr><th>Think Log</th></tr></thead>
			<tbody>
				<tr>
					<td>
						<div class="span1 post_face">
							<a href="user/?_<?php echo$po[1];?>">
								<img width="50" height="50" src="<?php echo $face_img_url[0][0]; ?>">
							</a>
						</div>

						<div class="post_content">
							<span class="post_user_name">
								<a href="user/?_<?php echo$po[1];?>">
									<?php echo $face_img_url[0][1]; ?>
								</a>
							</span>
							<h4><?php echo $po[2];//タイトル?></h4>
							<?php echo nl2br($this->InputText->autoLinker($po[3]));//本文?>
							<ul class="post_actions">
							
								<?php if(($u_id == $po[1])||($u_id ==0))://投稿がログインユーザーのものなら表示?>
								<li class="edit"><a href="#editModal_<?php echo $key;?>" data-toggle="modal"><i class="icon-edit"></i>編集</a></li>
								<li class="delete"><a href="#deleteModal_<?php echo $key;?>" data-toggle="modal"><i class="icon-trash"></i>削除</a></li>
								<?php endif;?>

								<li class="star">
									<a href="">
										<i class="icon-star"></i>"ほう"
									</a>
									<span class="agree_count" style="background-color:white;">
										<?php echo $po[4];?>
									</span>
								</li>
								<!-- <li class="comment_btn link_decoration"><a href="#cancel"><i class="icon-comment"></i>コメントする</a></li> -->
								<li class="share"><a href="" ><i class="icon-share"></i>シェア</a></li>
								<li class="date"><?php echo $po[5];?></il>
							</ul>
							<!-- コメント欄 -->
							<div class="comment_frame">
								<?php
								if(is_array($comment[$key])):
									foreach ($comment[$key] as $com_key => $co):
										//commentsテーブルの内容
										//| id | user_id | post_id | content | check_flag | date |
										//コメントとUIDをひもづけて画像を取得する
										$co_face_img_url =array();
										$co_face_img_url_sql = "SELECT tw_profile_image_url,tw_name FROM `tw_users` WHERE id=".$co[1];
										$co_face_img_url_res = mysql_query($co_face_img_url_sql);
										while($row = mysql_fetch_array($co_face_img_url_res,MYSQL_NUM)){
											array_push($co_face_img_url, $row);
										}
										?>
								<?php if($co)://もしコメントがついてたら下記を表示?>
								<div class="comment_group">
									<div class="co_face_icon">
										<a href="user/?_<?php echo$co[1];?>">
											<img width="40" height="40" src="<?php echo $co_face_img_url[0][0];?>" >
										</a>
									</div>
									<div class="comment_content">
										<span class="comment_user_name">
											<a href="user/?_<?php echo$co[1];?>">
												<?php echo $co_face_img_url[0][1];?>
											</a>
										</span>
										<p><?php echo nl2br($this->InputText->autoLinker($co[3]));?></p>
										<!-- 削除ボタン -->
										<ul>
											<li class="date"><?php echo $co[4]?></li>

											<?php if(($u_id == $co[1])||($u_id ==0))://コメントがログインユーザーのものなら表示?>
											<li class="delete"><a href="#delete_commentModal_<?php echo $key."_".$com_key;?>" data-toggle="modal">コメント削除</a></li>
											<?php endif;?>
										</ul>
									</div>
								</div>
								<?php endif;?>

								<?php if(($u_id == $co[1])||($u_id ==0))://コメントがログインユーザーのものなら表示?>
								<!-- コメント削除モーダル -->
								<form action="post_action.php" method="POST">
									<div id="delete_commentModal_<?php echo $key."_".$com_key;?>" class="modal hide fade">
									<div class="modal-header">
									    <a href="#" class="close" data-dismiss="modal">&times;</a>
									    <h3>このコメントを削除してもよろしいですか？</h3>
									</div>
									<div class="modal-body">
										<p><?php echo nl2br(autoLinker($co[3]));?></p>
									</div>
									<div class="modal-footer">
										<button class="btn" data-dismiss="modal">キャンセル</button>
										<input type="submit" name="delete_comment_btn" class="btn" value="OK">
									</div>
									</div>
									<input type="hidden" name="delete_comment_id" value="<?php echo$co[0]?>">
								</form>
								<?php endif;//フォームのendif?>
								<?php endforeach; endif;?>
							</div>
						<!-- コメントフォーム -->
							<form class="comment_form span6" action="post_action.php" method="POST">
								<textarea class="comment_textarea xxlarge span6" id="comment_<?php echo $po[0];?>" rows="2" name="comment_text" placeholder="質問や意見を書いてください"></textarea>
								<div class="control-group">
									<div class="controls">
										<input type="hidden" name="post_u_id" value="<?php echo$u_id;?>">
										<input type="hidden" name="commenposts_id" value="<?php echo$po[0];?>">
										<input type="submit" class="btn btn-mini" name="comment_btn" value="コメントする">
									</div>
								</div>
							</form>
						</div>
					</td>
				</tr>

				<!-- 投稿編集モーダル -->
				<form action="post_action.php" method="POST">
					<div id="editModal_<?php echo $key;?>" class="modal hide fade">
					<div class="modal-header">
					    <a href="#" class="close" data-dismiss="modal">&times;</a>
					    <input type="text" name="ediposts_title" value="<?php echo$po[2];?>" class="span6">
					</div>
					<div class="modal-body">
						<textarea name="ediposts_content" rows="11" class="span6"><?php echo$po[3]?></textarea>
					</div>
					<div class="modal-footer">
						<input type="submit" name="ediposts_btn" class="btn" value="完了">
					</div>
					</div>
					<input type="hidden" name="ediposts_id" value="<?php echo$po[0]?>">
				</form>

				<!-- 投稿削除モーダル -->
				<form action="post_action.php" method="POST">
					<div id="deleteModal_<?php echo $key;?>" class="modal hide fade">
					<div class="modal-header">
					    <a href="#" class="close" data-dismiss="modal">&times;</a>
					    <h3>この投稿を削除してもよろしいですか？</h3>
					</div>
					<div class="modal-body">
						<strong><?php echo$po[2]?></strong>
						<p><?php echo$po[3]?></p>
					</div>
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal">キャンセル</button>
						<input type="submit" name="delete_post_btn" class="btn" value="OK">
					</div>
					</div>
					<input type="hidden" name="delete_post_id" value="<?php echo$po[0]?>">
				</form>
			</tbody>
		</table>
	</div>






</div>