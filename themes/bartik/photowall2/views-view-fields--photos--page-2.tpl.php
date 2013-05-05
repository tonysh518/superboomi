<?php global $base_path;?>
<div class="box">
	<div style="display:none"><?php print $fields['field_boomi_image']->content;?></div>
    <div class="img">
    	<a data-c="<?php print $fields['comment_count']->content;?>" href="<?php print $base_path;?>photo-popup/<?php print $fields['nid']->content;?>?iframe=true" rel="popup[iframe]"><?php print $fields['field_boomi_image']->content;?></a>
    </div>
    <div class="desc">
    	<div class="desc_wrap clearfix">
    	<?php if(strlen($fields['name']->content)>10):?>
        	<div class="username"><a title="<?php print $fields['name']->content;?>" class="tips" href="<?php print $base_path;?>userphoto/<?php print $fields['uid']->content; ?>"><?php print substr($fields['name']->content, 0,10);?>...</a></div>
        <?php else:?>
        	<div class="username"><a href="<?php print $base_path;?>userphoto/<?php print $fields['uid']->content; ?>"><?php print $fields['name']->content;?></a></div>
        <?php endif;?>
        	<div class="like"><span class="like_btn"><?php print $fields['ops']->content;?></span> <span class="like_count"><?php print $fields['count']->content;?></span></div>
        </div>
    </div>
</div>