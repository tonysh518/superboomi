<a class="back" href="javascript:parent.closeWatchItem();">Back to list</a>
<div class="slider-wrapper theme-default" style="padding:0 0 80px 0;">
    <div id="slider" class="nivoSlider">
        <?php foreach($node->field_image['und'] as $image_item){
            $big_path = image_style_url('600x400',$image_item['uri']);
            $thumbnail_path = image_style_url('60x60',$image_item['uri']);
            echo '<img src="'.$big_path.'" data-thumb="'.$thumbnail_path.'" title="'.$image_item['title'].'" />';
        } ?>
    </div>
    <div id="htmlcaption" class="nivo-html-caption">
    </div>
</div>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({animSpeed:300, effect:'sliceUpLeft', controlNavThumbs:true,pauseTime:4000 });
    });
</script>