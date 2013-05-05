<?php global $user,$base_path;?>
<div id="bm_services_uploadbox_wrap" class="popup_box">
<div class="content">
<div class="popup_close"></div>
<form id="bm_services_upload_picture_form" action="<?php print $base_path; ?>index.php?q=superboomi_service/node/simple_create" method="POST" enctype="multipart/form-data">
	<div class="header">Upload My Photo</div>
	<div class="title">
		<label>title:</label>
		<input type="text" value="photo" name="title" />
	</div>
	<div class="terms">
		<label>Terms:</label>
		<select name="field_boomi_terms">
			<?php foreach ($terms as $id => $term_name):?>
				<option value="<?php print $id?>"><?php print $term_name?></option>
			<?php endforeach;?>
		</select>
	</div>
	<div class="file">
		<input id="" type="file" onchange="readURL(this);" name="field_boomi_image" /> 
	</div>
	<div>
		<input type="hidden" name="uid" value="<?php print $user->uid;?>"/>
	</div>
	<div class="submit">
		<input type="submit" value="Upload" id="bm_services_upload_picture" />
	</div>
	<div class="uploading"><img src="images/uploading.gif" /></div>
</form>
<form id="bm_services_upload_picture_crop_form" action="<?php print $base_path; ?>index.php?q=superboomi_service/node/simple_crop" method="POST">
	<div class="crop_tips">Crop your photo</div>
	<div class="crop"></div>
	<input type="hidden" name="nid" value=""/>
	<input type="hidden" name="x" value=""/>
	<input type="hidden" name="y" value=""/>
	<input type="hidden" name="width" value=""/>
	<input type="hidden" name="height" value=""/>
	<div class="submit">
		<input type="submit" value="Crop & Save" id="bm_services_upload_picture_crop" />
	</div>
	<div class="uploading"><img src="images/uploading.gif" /></div>
</form>
<div class="uploaded">
<div class="header">Uploaded</div>
<img src="images/uploaded.gif" />
<p>Photos will be published after reviewed</p>
<div class="close">Close</div>
</div>
</div>
</div>