<?php 
global $user;
global $language;
$prefix = $language->prefix;
$club_nodes = node_load_multiple(array(), array('type' => 'club','language' => $language->language));
drupal_add_js($base_path.'themes/bartik/js/bm_like.js', array('scope' => 'footer', 'weight' => 3));
drupal_add_js($base_path.'themes/bartik/js/bm_readwatch.js', array('scope' => 'footer', 'weight' => 4));
drupal_add_js($base_path.'themes/bartik/js/bm_printing.js', array('scope' => 'footer', 'weight' => 4));
drupal_add_js($base_path.'themes/bartik/js/bm_storyidea.js', array('scope' => 'footer', 'weight' => 4));
?>                     
<header>
    	<div class="header_bg png">
            <div class="header_wrap png">
            	<div class="text_logo link2home"></div>
                <div class="logo1"><img width="90" src="images/logo-bear0.gif"></div>
                <!--div class="logo link2home png">
                	<div class="logo_bear0 active"></div>
                	<div class="logo_bear1"><img width="123" src="images/logo-bear1.gif"></div>
                	<div class="logo_bear2"><img width="148" src="images/logo-bear2.gif"></div>
                	<div class="logo_bear3"><img width="194" src="images/logo-bear3.gif"></div>
                	<div class="logo_bear4"><img width="113" src="images/logo-bear4.gif"></div>
                	<div class="logo_bear5"><img width="113" src="images/logo-bear5.gif"></div>
                </div>
                <div class="logo_bg">
                	<div class="logo_bg0 active"><img width="98" height="97" src="images/logo-bg1.gif"></div>
                	<div class="logo_bg1"><img width="98" height="97" src="images/logo-bg1.gif"></div>
                	<div class="logo_bg2"><img width="98" height="97" src="images/logo-bg2.gif"></div>
                	<div class="logo_bg3"><img width="98" height="97" src="images/logo-bg3.gif"></div>
                	<div class="logo_bg4"><img width="98" height="97" src="images/logo-bg4.gif"></div>
                	<div class="logo_bg5"><img width="98" height="97" src="images/logo-bg5.gif"></div>    
                </div>
                <div class="logo_shadow"></div-->
                <nav>
                    <ul id="topNav">
                        <li class="nav1"><a href="<?php print $base_path.$prefix;?>#c_photowall">APP</a></li>
                        <li class="nav2"><a href="<?php print $base_path.$prefix;?>#c_readwatch">READ+WATCH</a></li>  
                        <li class="nav3"><a href="<?php print $base_path.$prefix;?>#c_playmake">Play&Make</a>
                            <ul>
                                <li class="nav3_1"><a href="#c_playmake">Printing</a></li>
                                <li class="nav3_2"><a href="#c_storyidea">Story Idea</a></li>
                                <!--li class="nav3_3"><a href="#c_storyidea">Download</a></li-->
                            </ul>

                        </li>
                        <li class="nav4"><a href="<?php print $base_path.$prefix;?>#c_friends">Friends</a></li>
                        <li class="nav5"><a href="<?php print $base_path.$prefix;?>#c_upclub">Club</a></li>
                    </ul>
                </nav>
                <?php if($user->uid == 0):?>
                <div class="userpanel"><span class="login_btn"><?php print t('Login')?></span> | <span class="register_btn"><?php print t('Register')?></span></div>           
            	<?php else:?>
                <div class="userpanel"><?php print t('Welcome');?> <a id="user_info" href="javascript:void(0);"><?php print_r($user->name);?></a> <?php print t('back');?>！  <a class="editprofile" href="javascript:void(0);"><?php print t('Edit profile')?></a> |  <?php if($user->roles[4]== 'editor'): ?> <a href="<?php print $base_path;?>admin/photos"><?php print t('Manage Photos')?></a> | <?php endif;?> <a href="<?php print $base_path?>user/logout"><?php print t('Logout')?></a></div>           
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
            <section id="photowall_home">

                <div class="section_wrap">
                    <?php 
		        		if($prefix=='cn')
		        		{
		        			include('homeslider_cn.php');
		        		}else{
		        			include('homeslider_en.php');
		        		}
		        	?>
                    <a id="link2appwall" href="#c_photowall">Lead me to the app photo wall</a>
                </div>
            </section>
            <section id="photowall">
                <div class="photowall_left">
	                <div class="photowall_left_wrap">
						<?php if($user->uid == 0):?>
		                <div class="header"><a title="Download BOOMi Photo Fun APP" target="_blank" href="https://itunes.apple.com/us/app/boomis-photo-fun!-cute-photo/id541484734?ls=1&mt=8"><img src="images/appicon.png" /></a></div>
	                    <div class="intro"><?php print t('Decorate your photos with BOOMi Photo Fun and share them online to show your friends around the world! Our gallery is updated daily, so check back often and enter our photo contests to win great BOOMi + bibop prizes. The more photos you take, the more chances you have to win!')?></div>
	                    <div class="upload2"><img class="login_btn" src="<?php print t('images/upload_icon2.gif');?>" /></div>
	                    <div class="login_btn2 login_btn"><?php print t('Login');?></div>
	                    <div class="reg_btn2 register_btn"><?php print t('Register');?></div>
	                    <div class="download"><a style="display:block;margin:0 0 0 8px;" title="<?php print t('Download BOOMi Photo Fun APP');?>" target="_blank" href="https://itunes.apple.com/us/app/boomis-photo-fun!-cute-photo/id541484734?ls=1&mt=8"><img src="images/appicontop.gif" /></a><a target="_blank" href="https://itunes.apple.com/us/app/boomis-photo-fun!-cute-photo/id541484734?ls=1&mt=8"><img src="images/appicon2.png" /></a></div>
	 					<div class="qrcode"><img src="<?php print $base_path;?>pic/qrcode.gif" /></div>
                        <?php else:?>
		                <div class="header"><img src="<?php print t('images/photowall_left_title.gif');?>" /></div>
	                    <div class="avator">
	                    	<div class="change_avator"><?php print t('Change<br/>Profile<br/>Pic');?></div>
	                    <?php
							print views_embed_view('user', 'block');
						?>
						</div>
						<div class="username"><?php print $user->name;?><a class="editprofile" href="javascript:void(0);"><?php print t('Edit profile')?></a></div>
	                    <div class="upload"><img class="upload_btn" src="<?php print t('images/upload_icon.gif');?>" /></div>
	                    <ul class="user_wall">
	                        <?php
								print views_embed_view('heartbeat_activity_fields_', 'block');
							?>
	                    </ul>
	                    <?php endif;?>
                    </div>
                    <div id="photowall_left_arrow" class="opened"></div>
                </div>
                <div class="photowall_right">
                    <div class="photowall_category">
                        <div class="title"><img src="<?php print t('images/findphoto.gif');?>" /></div>
                        <ul class="photowall_category_icons">
                            <li class="all"><a class="tips" title="All" class="actived" href="photos">All</a></li>
                            <li class="top"><a class="tips" title="Popular" href="photocat/1">Popular</a></li>
                            <li class="animal"><a class="tips" title="Animals" href="photocat/2">Animals</a></li>
                            <li class="child"><a class="tips" title="Cute" href="photocat/3">Cute</a></li>
                            <li class="friend"><a class="tips" title="Friends" href="photocat/4">Friends</a></li>
                            <li class="others"><a class="tips" title="Random" href="photocat/5">Random</a></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                     <div id="photowall_text"><span><?php print t('Welcome to our BOOMi photo wall! We\'re adding more fun features, so check back every week!')?></span></div>
                    <div id="photowall_row1">
                    	<div id="photowall_toppick">
							<?php
								print views_embed_view('photos', 'block_3');
							?>
						</div>
                    	<div id="photowall_banner"><a href="<?php print $base_path;?>pic/banner_b.jpg"><img src="<?php print $base_path;?>pic/banner.jpg" /></a></div>
                    </div>
                   <div class="cate_cover">
	                    <div class="cate_cover_item">
		                    <div class="cate_title"><img src="<?php print $base_path;?>pic/cate_1.png" /></div>
			                <?php
								print views_embed_view('photos', 'block_2',1);
							?>
						</div>
						<div class="cate_cover_item">
		                    <div class="cate_title"><img src="<?php print $base_path;?>pic/cate_2.png" /></div>
			                <?php
								print views_embed_view('photos', 'block_2',2);
							?>
						</div>
						<div class="cate_cover_item">
		                    <div class="cate_title"><img src="<?php print $base_path;?>pic/cate_3.png" /></div>
			                <?php
								print views_embed_view('photos', 'block_2',3);
							?>
						</div>
						<div class="cate_cover_item" style="margin-right:0;">
		                    <div class="cate_title"><img src="<?php print $base_path;?>pic/cate_4.png" /></div>
			                <?php
								print views_embed_view('photos', 'block_2',4);
							?>
						</div>
					</div>
                    <div id="photowall_container" class="transitions-enabled infinite-scroll clearfix">
                        <?php
							print views_embed_view('photos', 'page');
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
        <section class="section_box" id="section_2">
        	<div class="readwatch_wrap">
            <!--div class="read_watch_text"><span><?php print t('Click on the videos below to watch BOOMi in action + join BOOMi’s creator for a behind-the-scenes peek at his company. UP Studios! ')?></span></div-->
                <div class="readwatch_btn"><a class="active" href="#" id="btn_videos">Videos</a><a href="#" id="btn_comics">Comics</a></div>
                <?php
                    print views_embed_view('read_watch', 'block');
                ?>
                <?php
                    print views_embed_view('read_watch', 'block_1');
                ?>
            </div>
            <div id="watch_item_wrap"></div>
        </section>
        <!-- play & make -->
        <section class="section_box" id="section_3">
            <div id="section_printing">
                <div class="printing_wrap">

                    <div class="printing_top">
                        <div class="printing_header"><img src="<?php print $base_path;?>pic/artgallery_title.png" /></div>
                        <div class="printing_download_box">
                            <div class="printing_step">1</div>
                            <h3>Download sketch</h3>
                            <div class="printing_download_carousel">
                                <div class="printing_download_item">
                                    <a class="img" target="_blank" href="<?php print $base_path;?>pic/sketch/1.zip"><img src="<?php print $base_path;?>pic/sketch/s1.jpg" /></a>
                                    <a class="download" target="_blank" href="<?php print $base_path;?>pic/sketch/1.zip">Download</a>
                                </div>
                                <div class="printing_download_item">
                                    <a class="img" target="_blank" href="<?php print $base_path;?>pic/sketch/2.zip"><img src="<?php print $base_path;?>pic/sketch/s2.jpg" /></a>
                                    <a class="download" target="_blank" href="<?php print $base_path;?>pic/sketch/2.zip">Download</a>
                                </div>
                                <div class="printing_download_item">
                                    <a class="img" target="_blank" href="<?php print $base_path;?>pic/sketch/3.zip"><img src="<?php print $base_path;?>pic/sketch/s3.jpg" /></a>
                                    <a class="download" target="_blank" href="<?php print $base_path;?>pic/sketch/3.zip">Download</a>
                                </div>

                            </div>
                        </div>

                        <form id="from_upload_print" name="upload_print" method="post" enctype="multipart/form-data" action="<?php print $base_path; ?>superboomi_service/printing">

                            <div class="printing_step">2</div>
                            <div class="icon_boomi"><img src="<?php print $base_path;?>pic/si_boomi.png" /></div>
                            <?php if($user->uid): ?>
                                <div class="file"><input type="file" name="field_image" id="field_image" /></div>
                                <div class="upload">
                                    <input name="" type="submit" value="Send" />
                                    <a href="###">Select a new one</a>
                                </div>
                                <div class="errorMsg"><?php print t('Select your printing');?></div>
                                <div class="loadingMsg">Uploading...<br/><img src="<?php print $base_path;?>images/uploading.gif" /></div>
                                <div id="printing_sent"><?php print t('Please wait BOOMi to approve your great work! <br /><a href="###">I have another printing!</a>');?></div>
                            <?php else:?>
                                <a href="javascript:void(0)" class="login_btn">login</a>
                                <a href="javascript:void(0)" class="register_btn">Register</a>
                            <?php endif;?>
                        </form>
                    </div>

                    <div class="clear"></div>
                    <div id="printing_list"></div>

                </div>
            </div>

            <div id="section_storyidea">
                <form id="form_storyidea" name="form_storyidea" method="post" action="javascript:void(0)">
                    <div>
                        <div class="icon_idea"><img src="<?php print $base_path;?>pic/si_idea.png" /></div>
                        <div class="icon_boomi"><img src="<?php print $base_path;?>pic/si_boomi.png" /></div>
                        <div id="storyidea_fields">

                            <?php if($user->uid): ?>
                                <textarea name="body" class="idea_body" cols="41"></textarea>
                                <input type="submit" value="Send" class="submit" />
                                <div class="errorMsg"><?php print t('Blank is not a good idea!');?></div>
                                <div class="loadingMsg"><?php print t('Your idea is on the way, please wait a while!');?></div>
                            <?php else: ?>
                                <div class="login"><a href="###" class="login_btn">Login</a> or <a href="###" class="register_btn">Register</a> Now! Write your great idea!</div>
                            <?php endif;?>
                        </div>
                        <div id="storyidea_sent"><?php print t('Please wait to approve your great idea! <a href="###">I have another story idea!</a>');?></div>
                    </div>
                </form>
                <div id="storyidea_list"></div>
            </div>
        </section>
		<section class="section_box" id="section_4">
        	<?php 
        		if($prefix=='cn')
        		{
        			include('friend_cn.php');
        		}else{
        			include('friend_en.php');
        		}
        	?>
        	
        </section>
		<section class="section_box" id="section_5">
        	<div id="section_5_1">
			    <div class="section_wrap">
			      <div class="slider_wrap">
			        <ul id="clubflip">
			        <?php foreach($club_nodes as $club):?>
			          <li> 
			            <a class="farwardproduct" href="javascript:void(0);"><img width="229" height="300" src="images/space.gif"></a>
			            <?php print theme('image_style', array('style_name' => '229x300', 'path' => $club->field_image[und][0]['uri'])); ?>
			            <div class="desc"><?php print($club->title);?></div>
			          </li>
			        <?php endforeach;?>
			        </ul>
			        <div class="pager">
			        <?php foreach($club_nodes as $club):?> 
			        	<a href="###"></a>
					<?php endforeach;?>
					 </div>
			      </div>
			    </div>
			</div>
			
			<div id="section_5_2">
			    <div class="product_prev"><span>Prev</span></div>
			    <div class="product_next"><span>Next</span></div>
			    <div class="club_product_detail_list_wrap clearfix">
			        <div class="club_product_detail_list">
			        	<?php foreach($club_nodes as $club):?>
						<div class="club_product_detail clearfix">
						    <div class="product_pictures">
						        <div class="product_thumbnail">
						            <?php foreach($club->field_image[und] as $imgs):?>
										<div style="background:url(<?php print image_style_url('60x60', $imgs['uri']); ?>) no-repeat;"></div>			
						            <?php endforeach;?>  
						        </div>
						        <div class="product_img">
						        <?php foreach($club->field_image[und] as $imgs):?>
									<div class="big_img"><a class="cloud-zoom" href="<?php print file_create_url($imgs['uri'])?>" style="background:url(<?php print image_style_url('320x420', $imgs['uri']); ?>) no-repeat;"><img src="<?php print image_style_url('320x420', $imgs['uri']); ?>" width="320" height="420" /></a></div>
								<?php endforeach;?>    
								</div>
						    </div>
						    <div class="product_detail_right">
						        <h2 class="clearfix"><span><?php print($club->title);?></span></h2>
						        <div class="clear"></div>
						        <div class="attribute"><?php print($club->field_attributes[und][0][safe_value]);?></div>
						        <div class="desc"><?php print($club->body[und][0][safe_value]);?></div>
						        <div class="buyit"><a target="_blank" href="<?php print($club->field_video_url[und][0][value]);?>"><?php print t('Buy it!')?></a></div>
						        <div class="return"><?php print t('Back to list')?></div>
						    </div>
						</div>
						<?php endforeach;?>
			        </div>
			    </div>
			    <div class="club_product_recommend clearfix">
			        <div class="header"><?php print t('Recommend')?></div>
			        <ul>
			        <?php foreach($club_nodes as $club):?>
						<li>
						    <div><a style="background:url(<?php print image_style_url('80x80', $club->field_image[und][0]['uri']); ?>) no-repeat;" href="javascript:void(0)" class="tips" title="<?php print($club->title);?>"></a></div>
						</li>
					<?php endforeach;?>
			        </ul>
			    </div>
			</div>
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
	</script>