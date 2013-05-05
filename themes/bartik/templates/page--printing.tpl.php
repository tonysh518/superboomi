<?php
    drupal_add_js($base_path.'themes/bartik/js/bm_like.js', array('scope' => 'footer', 'weight' => 3));
    drupal_add_js($base_path.'themes/bartik/js/bm_printing.js', array('scope' => 'footer', 'weight' => 4));
?>
<h2>Upload My Printing</h2>
<form id="from_upload_print" name="upload_print" method="post" enctype="multipart/form-data" action="<?php print $base_path; ?>superboomi_service/printing">
    <input type="file" name="field_image" id="field_image" />
    <input name="" type="submit" value="Send" />
    <div class="errorMsg"><?php print t('Select your printing');?></div>
    <div class="loadingMsg"><?php print t('Your printing is on the way, please wait a while!');?></div>
</form>
<div id="printing_sent"><?php print t('Please wait to approve your great work! <a href="###">I have another printing!</a>');?></div>
<div id="printing_list"></div>