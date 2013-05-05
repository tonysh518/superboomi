<?php global $user,$base_path;?>
<div id="bm_services_userpane_wrap" class="popup_box">
	<div class="popup_close"></div>
	<ul class="tab">
		<li class="actived">Change Avator</li>
		<li>Change Password</li>
		<li>Change Username</li>
	</ul>
	<div id="bm_services_useravator_wrap" class="content">
		<form id="bm_services_userpicture_form" action="<?php print $base_path; ?>index.php?q=bm_services_update_user_picture" method="POST" enctype="multipart/form-data">
			<div class="header">Upload Avator</div>
			<div class="file">
				<input id="" type="file" onchange="readURL_avator(this);" name="files[picture_upload]" /> 
			</div>
			<div>
				<input type="hidden" name="uid" value="<?php print $user->uid;?>"/>
			</div>
			<div class="submit">
				<input type="submit" value="Upload" id="bm_services_upload_avator" disabled="disabled"/>
			</div>
			<div class="uploading"><img src="images/uploading.gif" /></div>
		</form>
		<form id="bm_services_userpicture_crop_form" action="<?php print $base_path; ?>index.php?q=bm_services_update_user_picture_crop" method="POST">
			<div class="crop_tips">Crop your photo</div>
			<div class="crop"></div>
			<input type="hidden" name="uri" value=""/>
			<input type="hidden" name="x" value=""/>
			<input type="hidden" name="y" value=""/>
			<input type="hidden" name="width" value=""/>
			<input type="hidden" name="height" value=""/>
			<div class="submit">
				<input type="submit" value="Crop & Save" id="bm_services_upload_avator_crop" />
			</div>
			<div class="uploading"><img src="images/uploading.gif" /></div>
		</form>
		<div class="uploaded">
			<div class="header">Uploaded</div>
			<img src="images/uploaded.gif" />
			<div class="close">Close</div>
		</div>
	</div>

	<div id="bm_services_userpass_wrap">
		<form id="bm_services_user_pass_form" action="<?php print $base_path; ?>index.php?q=superboomi_service/user/simple_update" method="POST">
			<div class="filed_text">
				<label>Password</label>
				<p><input name="pass" type="password" /></p>
			</div>
			<div class="filed_text">
				<label>Repeat Password</label>
				<p><input name="pass2" type="password" /></p>
			</div>
			<div>
				<input type="hidden" name="uid" value="<?php print $user->uid;?>"/>
			</div>
			<div class="submit">
				<input type="submit" value="change" id="bm_services_change_pass"/>
			</div>
		</form>
	</div>
	
	<div id="bm_services_username_wrap">
		<form id="bm_services_username_form" action="<?php print $base_path; ?>index.php?q=bm_services_update_username" method="POST">
			<div class="filed_text">
				<label>Email</label>
				<p><?php print $user->mail;?></p>
			</div>
			<div class="filed_text" style="margin:15px 0 0;">
				<label>User name</label>
				<p><input name="username" type="text" value="<?php print $user->name;?>" /></p>
			</div>
			<div>
				<input type="hidden" name="uid" value="<?php print $user->uid;?>"/>
			</div>
			<div class="submit">
				<input type="submit" value="change" id="bm_services_update_username"/>
			</div>
		</form>
	</div>
</div>