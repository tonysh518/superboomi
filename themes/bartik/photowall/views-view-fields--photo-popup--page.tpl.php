<?php global $base_path;?>
<div class="app_item_popup box">
	<div style="width:1px;height:1px;position:absolute;top:-5px;"><?php print $fields['field_boomi_image']->content;?></div>
	<div class="pic">
	    <?php print $fields['field_boomi_image']->content;?>
	</div>
	<div class="info">  	
	    <div class="username"><a target="_parent" href="<?php print $base_path;?>userphoto/<?php print $fields['uid']->content; ?>"><?php print $fields['name']->content;?></a></div>
	    <div class="like"><span class="like_count"><?php print $fields['count']->content;?></span><span class="like_btn"><?php print $fields['ops']->content;?></span></div>
	</div>
</div>