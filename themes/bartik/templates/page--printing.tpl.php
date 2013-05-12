<?php
    drupal_add_js($base_path.'themes/bartik/js/bm_like.js', array('scope' => 'footer', 'weight' => 3));
    drupal_add_js($base_path.'themes/bartik/js/bm_printing.js', array('scope' => 'footer', 'weight' => 4));
?>
<div class="printing_wrap">

    <div class="printing_top">
        <div class="printing_download_box">
            <div class="printing_step">1</div>
            <h3>Download sketch</h3>
            <div class="printing_download_carousel">
                <div class="printing_download_item">
                    <a class="img" href="#"><img src="<?php print $base_path;?>pic/sketch.jpg" /></a>
                    <a class="download" href="#">Download</a>
                </div>
                <div class="printing_download_item">
                    <a class="img" href="#"><img src="<?php print $base_path;?>pic/sketch.jpg" /></a>
                    <a class="download" href="#">Download</a>
                </div>
                <div class="printing_download_item">
                    <a class="img" href="#"><img src="<?php print $base_path;?>pic/sketch.jpg" /></a>
                    <a class="download" href="#">Download</a>
                </div>

            </div>
        </div>

        <form id="from_upload_print" name="upload_print" method="post" enctype="multipart/form-data" action="<?php print $base_path; ?>superboomi_service/printing">

            <div class="printing_step">2</div>
            <div class="icon_boomi"><img src="<?php print $base_path;?>pic/si_boomi.png" /></div>
            <div class="file"><input type="file" name="field_image" id="field_image" /></div>
            <div class="upload">
                <input name="" type="submit" value="Send" />
                <a href="###">Select a new one</a>
            </div>
            <div class="errorMsg"><?php print t('Select your printing');?></div>
            <div class="loadingMsg">Uploading...<br/><img src="<?php print $base_path;?>images/uploading.gif" /></div>
            <div id="printing_sent"><?php print t('Please wait BOOMi to approve your great work! <br /><a href="###">I have another printing!</a>');?></div>
        </form>
    </div>

    <div class="clear"></div>
    <div id="printing_list"></div>

</div>