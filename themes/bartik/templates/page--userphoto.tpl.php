<?php 
$this_user = user_load(arg(1));
global $language;
$prefix = $language->prefix;
?>
<header>
    	<div class="header_bg png">
            <div class="header_wrap png">
            	<a href="../" class="text_logo"></a>
                <div class="logo link2home png">
                	<div class="logo_bear1 active"><img width="123" src="<?php print $base_path;?>images/logo-bear1.gif"></div>
                	<div class="logo_bear2"><img width="148" src="<?php print $base_path;?>images/logo-bear2.gif"></div>
                	<div class="logo_bear3"><img width="194" src="<?php print $base_path;?>images/logo-bear3.gif"></div>
                	<div class="logo_bear4"><img width="113" src="<?php print $base_path;?>images/logo-bear4.gif"></div>
                	<div class="logo_bear5"><img width="113" src="<?php print $base_path;?>images/logo-bear5.gif"></div>
                </div>
                <div class="logo_bg">
                	<div class="logo_bg1 active"><img width="98" height="97" src="<?php print $base_path;?>images/logo-bg1.gif"></div>
                	<div class="logo_bg2"><img width="98" height="97" src="<?php print $base_path;?>images/logo-bg2.gif"></div>
                	<div class="logo_bg3"><img width="98" height="97" src="<?php print $base_path;?>images/logo-bg3.gif"></div>
                	<div class="logo_bg4"><img width="98" height="97" src="<?php print $base_path;?>images/logo-bg4.gif"></div>
                	<div class="logo_bg5"><img width="98" height="97" src="<?php print $base_path;?>images/logo-bg5.gif"></div>    
                </div>
                <div class="logo_shadow"></div>
                <nav>
                    <ul id="topNav">
                        <li class="nav1"><a href="<?php print $base_path.$prefix;?>#c_photowall">APP</a></li>
                        <li class="nav2"><a href="<?php print $base_path.$prefix;?>#c_readwatch">READ+WATCH</a></li>  
                        <li class="nav3"><a href="<?php print $base_path.$prefix;?>#c_playmake">SHOP</a></li>
                        <li class="nav4"><a href="<?php print $base_path.$prefix;?>#c_friends">FAN FUN</a></li>
                        <li class="nav5"><a href="<?php print $base_path.$prefix;?>#c_upclub">BOOMI’S CREATOR</a></li>
                    </ul>
                </nav>
                <?php if($user->uid == 0):?>
                <div class="userpanel"><span class="login_btn">Login</span> | <span class="register_btn">Register</span></div>           
            	<?php else:?>
                <div class="userpanel">Welcome <a id="user_info" href="javascript:void(0);"><?php print_r($user->name);?></a> back！  <a id="changepass" href="javascript:void(0);">Change password</a> | <a href="<?php print $base_path?>user/logout">Logout</a></div>           
            	<?php endif;?>
            </div>
            <div class="language">
                <a href="#">中文</a>
            </div>
        </div>
    </header>
    <div class="section_container_box">
    <div class="section_container">
        <section class="section_box" id="section_1">
            <section id="photowall">
                <div class="photowall_left">
                	<div class="photowall_left_wrap">
		                <div class="header_text"><?php print $this_user->name?>'s photowall</div>
	                    <div class="avator2">
	                    <?php
							print views_embed_view('user', 'block_1',arg(1));
						?>
						</div>
	                    <ul class="user_wall">
	                        <?php
								print views_embed_view('heartbeat_activity_fields_', 'block_1', arg(1));
							?>
	                    </ul>
	                    <a class="back_btn" href="<?php print $base_path;?>index.php#c_photowall">Back</a>
                    </div>
                    <div id="photowall_left_arrow" class="opened"></div>
                </div>
                <div class="photowall_right">
                	<div class="photowall_header"><a class="back_btn" href="<?php print $base_path;?>index.php#c_photowall">Back</a></div>
                    <div class="clear"></div>
                    <div id="photowall_container" class="transitions-enabled infinite-scroll clearfix">
                        <?php
							print views_embed_view('photos', 'page_1');
						?>
                    </div>
                </div>
                
                <nav id="page-nav">
                  <a href="photo-2.html">NEXT</a>
                </nav>
                <script>    
                
                </script>
            </section>
        </section>

        <div class="clear"></div>
    </div>
    </div>
    <?php if ($page['footer']): ?>
		<?php print render($page['footer']); ?>
    <?php endif; ?>
    
	<?php include('popup.php');?>
	
	<div class="overlay"></div>
	<div class="overlay2"></div>
	<div id="messsage_box"></div>
	
	<script>
	var userid = <?php print $user->uid; ?>;
	$(document).ready(function(){  
		$('.user_wall .like').html('<img src="<?php print $base_path;?>images/like_s.png" />');
		$('.user_wall .user').html('<?php print $this_user->name;?>\'s');
		$("a[rel^='popup']").prettyPhoto({'default_width':400,'default_height':430,iframe_markup: '<iframe src ="{path}" width="{width}" height="{height}" frameborder="no" scrolling="no"></iframe>',social_tools:''});
		
		var $container = $('#photowall_container');
		$container.imagesLoaded(function(){
		  $container.masonry({
			singleMode: false,
			itemSelector: '.box',
			columnWidth: 0, 
			isFitWidth: true,
		  });
		});
		
		$container.infinitescroll({
		  navSelector  : '#page-nav',    // selector for the paged navigation 
		  nextSelector : '#page-nav a:first',  // selector for the NEXT link (to page 2)
		  itemSelector : '.box',     // selector for all items you'll retrieve
		  //debug: true,
		  loading: {
			  msgText: ' ',
			  finishedMsg: 'End',
			  img: 'http://www.superboomi.com/images/photowall_loading.gif'
			},
			state: {
			  currPage: 0 // The number of the first comment page loaded, you can generate this number dynamically to save changing it manually
			},        
		
			pathParse: function(path,nextPage){
				path = ['?page=',''];
				return path;
			}
		  },
		  // trigger Masonry as a callback
		  function( newElements ) {
			// hide new items while they are loading
			var $newElems = $( newElements ).css({ opacity: 0 });
			// ensure that images load before adding to masonry layout
			$newElems.imagesLoaded(function(){
			  // show elems now they're ready
			  $("a[rel^='popup']").prettyPhoto({'default_width':400,'default_height':430,iframe_markup: '<iframe src ="{path}" width="{width}" height="{height}" frameborder="no" scrolling="no"></iframe>',social_tools:''});
			  $newElems.animate({ opacity: 1 });
			  $container.masonry( 'appended', $newElems, true ); 
			});
		  }
		);
	});	
	</script>
	
	<style>
		.photowall_left {display:block;}
	</style>