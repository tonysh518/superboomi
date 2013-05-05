<?php
    drupal_add_js($base_path.'themes/bartik/js/bm_like.js', array('scope' => 'footer', 'weight' => 3));
    drupal_add_js($base_path.'themes/bartik/js/bm_storyidea.js', array('scope' => 'footer', 'weight' => 5));
?>
<h2>I want to see BOOMi</h2>
<form id="form_storyidea" name="form_storyidea" method="post" action="javascript:void(0)">
    <div>
        <input name="body" class="idea_body" />
        <input type="submit" value="Send" />
        <div class="errorMsg"><?php print t('Blank is not a good idea!');?></div>
        <div class="loadingMsg"><?php print t('Your idea is on the way, please wait a while!');?></div>
    </div>
</form>
<div id="storyidea_sent"><?php print t('Please wait to approve your great idea! <a href="###">I have another story idea!</a>');?></div>
<div id="storyidea_list"></div>