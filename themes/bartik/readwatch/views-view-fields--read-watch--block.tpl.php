<?php
drupal_add_js($base_path.'themes/bartik/js/bm_like.js', array('scope' => 'footer', 'weight' => 3));
drupal_add_js($base_path.'themes/bartik/js/bm_readwatch.js', array('scope' => 'footer', 'weight' => 5));
?>
<li>
	<a target="_blank" data-nid="<?php print $fields['nid']->content;?>" href="<?php print $fields['field_video_url']->content;?>"><img width="470" height="300" src="images/space.gif"></a>
	<?php print $fields['field_image']->content;?>
	<div class="desc">
	    <span>
	        <h2><?php print $fields['title']->content;?></h2>
	        <p><?php print $fields['body']->content;?></p>
	    </span>
	</div>
</li>