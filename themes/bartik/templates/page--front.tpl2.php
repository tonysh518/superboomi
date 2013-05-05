<?php 
global $user;
?>
<header>
    	<div class="header_bg png">
            <div class="header_wrap png">
            	<div class="text_logo link2home"></div>
                <div class="logo link2home png">
                	<div class="logo_bear0 active"><img width="123" src="images/logo-bear0.gif"></div>
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
                <div class="logo_shadow"></div>
                <nav>
                    <ul id="topNav">
                        <li class="nav1"><a href="<?php print $base_path;?>index.php#c_photowall">APP</a></li>
                        <li class="nav2"><a href="<?php print $base_path;?>index.php#c_readwatch">READ+WATCH</a></li>  
                        <li class="nav3"><a href="<?php print $base_path;?>index.php#c_playmake">SHOP</a></li>
                        <li class="nav4"><a href="<?php print $base_path;?>index.php#c_friends">FAN FUN</a></li>
                        <li class="nav5"><a href="<?php print $base_path;?>index.php#c_upclub">BOOMI’S CREATOR</a></li>
                    </ul>
                </nav>
                <?php if($user->uid == 0):?>
                <div class="userpanel"><span class="login_btn">Login</span> | <span class="register_btn">Register</span></div>           
            	<?php else:?>
                <div class="userpanel">Welcome <a id="user_info" href="javascript:void(0);"><?php print_r($user->name);?></a> back！  <a class="editprofile" href="javascript:void(0);">Edit profile</a> |  <?php if($user->roles[4]== 'editor'): ?> <a href="<?php print $base_path;?>admin/photos">Manage Photos</a> | <?php endif;?> <a href="<?php print $base_path?>user/logout">Logout</a></div>           
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
                    <div class="slider_wrap">
                        <ul id="flip" style="left: -1840px;">
						  <li>
						  	<a target="_blank" href="https://itunes.apple.com/us/app/boomis-photo-fun!-cute-photo/id541484734?ls=1&mt=8"><img width="470" height="300" src="images/space.gif"></a>
						    <img width="470" height="300" src="pic/home_1.jpg">
						    <span>BOOMi Photo Fun is completely redesigned for 2013!</span>
						  </li>
						  <li>
						  	<a class="video" target="_blank" href="http://player.youku.com/embed/XNTAwNjMwMTE2"><img width="470" height="300" src="images/space.gif"></a>
						    <img width="470" height="300" src="pic/home_6.jpg">
						    <span>Watch the New BOOMi Photo Fun video!</span>
						  </li>
						  <li>
						  	<a target="_blank" href="https://itunes.apple.com/us/app/boomis-photo-fun!-cute-photo/id541484734?ls=1&mt=8"><img width="470" height="300" src="images/space.gif"></a>
						    <img width="470" height="300" src="pic/home_2.jpg">
						    <span>Download BOOMi's fun new app today!</span>
						  </li>
						  
						  <li>
						  	<a href="#c_friends"> <img width="470" height="300" src="images/space.gif"></a>
						    <img width="470" height="300" src="pic/home_3.jpg">
						    <span>Meet the stars of BOOMi + bibop's series!</span>
						  </li>
						  
						  <li>
						  	<a target="_blank" href="http://www.elleshop.com.cn/product/g-6207.htm"><img width="470" height="300" src="images/space.gif"></a>
						    <img width="470" height="300" src="pic/home_4.jpg">
						    <span>Find the perfect cute gift at ELLEshop</span>
						  </li>
						  
						  <li>
						  	<a target="_blank" href="http://www.trevorlai.com/media.html"><img width="470" height="300" src="images/space.gif"></a>
						    <img width="470" height="300" src="pic/home_5.jpg">
						    <span>Meet BOOMi's Creator, Trevor Lai</span>
						  </li>
						</ul>
						            	
                        <div class="pager">
                            <a href="###" class="active">1</a>
                            <a href="###">2</a>
                            <a href="###">3</a>
                            <a href="###">4</a>
                            <a href="###">5</a>
                            <a href="###">6</a>
                        </div>
                    </div>
                    <a id="link2appwall" href="#c_photowall">Lead me to the app photo wall</a>
                </div>
            </section>
            <section id="photowall">
                <div class="photowall_left">
	                <div class="photowall_left_wrap">
						<?php if($user->uid == 0):?>
		                <div class="header"><a title="Download BOOMi Photo Fun APP" target="_blank" href="https://itunes.apple.com/us/app/boomis-photo-fun!-cute-photo/id541484734?ls=1&mt=8"><img src="images/appicon.png" /></a></div>
	                    <div class="intro">Decorate your photos with BOOMi Photo Fun and share them online to show your friends around the world! Our gallery is updated daily, so check back often and enter our photo contests to win great BOOMi + bibop prizes. The more photos you take, the more chances you have to win!</div>
	                    <div class="upload2"><img class="login_btn" src="images/upload_icon2.gif" /></div>
	                    <div class="login_btn2 login_btn">Login</div>
	                    <div class="reg_btn2 register_btn">Register</div>
	                    <div class="download"><a style="display:block;margin:0 0 0 8px;" title="Download BOOMi Photo Fun APP" target="_blank" href="https://itunes.apple.com/us/app/boomis-photo-fun!-cute-photo/id541484734?ls=1&mt=8"><img src="images/appicontop.gif" /></a><a target="_blank" href="https://itunes.apple.com/us/app/boomis-photo-fun!-cute-photo/id541484734?ls=1&mt=8"><img src="images/appicon2.png" /></a></div>
	 					<?php else:?>
		                <div class="header"><img src="images/photowall_left_title.gif" /></div>
	                    <div class="avator">
	                    	<div class="change_avator">Change<br/>Profile<br/>Pic</div>
	                    <?php
							print views_embed_view('user', 'block');
						?>
						</div>
						<div class="username"><?php print $user->name;?><a class="editprofile" href="javascript:void(0);">Edit profile</a></div>
	                    <div class="upload"><img class="upload_btn" src="images/upload_icon.gif" /></div>
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
                        <div class="title"><img src="images/findphoto.gif" /></div>
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
                    <div id="photowall_text"><span>Welcome to our BOOMi photo wall! We're continuing to improve the design and add more fun features. Our first BOOMi Photo Fun contest will be taking place in February 2013 so check back here soon for details!</span></div>
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
        	<div class="section_wrap">
	        	<div class="slider_wrap">
					
				    <?php
						print views_embed_view('read_watch', 'block');
					?>
				</div>
			</div>
        </section>
        <section class="section_box" id="section_3">
        	<div class="coming-soon-run">
        		<div class="coming-soon-text"></div>
        	</div>
        </section>
		<section class="section_box" id="section_4">
        	<div class="friends_box">
            	<div class="friends_main_box">
                	<div id="friends_boomi" class="friends_item">
                        <div class="friends_big_pic">
                        	<img src="pic/friends/gallery/boomi.jpg" width="314" height="400" />
                            <img src="pic/friends/gallery/boomi2.jpg" width="314" height="400" style="display:none;" />
                            <img src="pic/friends/gallery/boomi3.jpg" width="314" height="400" style="display:none;" />
                        </div>
                        <div class="friends_desc">
                            <div class="friends_name">BOOMi</div>
                            <div class="friends_intro friends_intro_long">
                            <div class="friends_intro_inner">
                            BOOMi believes he can do anything he sets his imagination to! Astronaut, dinosaur hunter, ocean explorer -- the possibilities are unlimited for BOOMi, who immerses himself in the world of each role. Hyperactive, smart and curious, BOOMi embarks on every adventure with his puppy and adorable sidekick, bibop. BOOMi gets in trouble sometimes when he uses his creativity to come up with elaborate pranks to pull on his classmates, especially Hao Hao.<br/><br/>
							bibop<br/>
							Hyper and curious, bibop is BOOMi's loyal companion. When he's not joining adventures, bibop can usually be found chasing and collecting anything that resembles a bone.<br/>
							Fun fact: BOOMi adopted the puppy when bibop was only 2 months old and still a "baby", so BOOMi spells his name with a lowercase "b". This "b" is also engraved on bibop's collar tag.
							</div>
							</div>
                            <div class="friends_more_btn tips" title="More photos"></div>
                        </div>
                        <div class="friends_more_pic">
                        	<div class="friends_more_pic_wrap">
                        	<img src="pic/friends/gallery/s_boomi.jpg" width="120" height="88" />
                            <img src="pic/friends/gallery/s_boomi2.jpg" width="120" height="88"  />
                            <img src="pic/friends/gallery/s_boomi3.jpg" width="120" height="88"  />
                            </div>
                      </div>
                    </div>
                    
                    <div id="friends_hip" class="friends_item">
                        <div class="friends_big_pic"><img src="pic/friends/gallery/hip.jpg" width="314" height="400" /></div>
                        <div class="friends_desc">
                            <div class="friends_name">Hip</div>
                            <div class="friends_intro">
                            Hip wants to conquer Hollywood -- one joke at a time! Tossing wisecracks as fast as he gobbles baby carrots, the twin bunny seeks the spotlight wherever he can find it. So if there's a talent show or movie casting in town, you can be sure to find Hip shining on stage!
                            </div>
                        </div>
                    </div>
                    
                    <div id="friends_hop" class="friends_item">
                        <div class="friends_big_pic"><img src="pic/friends/gallery/hop.jpg" width="314" height="400" /></div>
                        <div class="friends_desc">
                            <div class="friends_name">Hop</div>
                            <div class="friends_intro">
                            Hop is the complete opposite of his talkative twin brother, Hip – in fact, no one at Happy Clover has ever heard him speak a full sentence! Instead, the musically-talented bunny lets his music do the talking. Having mastered the piano, cello, harp, Chinese <a href="http://en.wikipedia.org/wiki/Pipa" target="_blank">pipa</a> and 28 other instruments by the age of six, Hop is just counting the days down in school before he can graduate and start touring around the world.</div>
                        </div>
                    </div>
                    
                    <div id="friends_martin" class="friends_item">
                        <div class="friends_big_pic"><img src="pic/friends/gallery/martin.jpg" width="314" height="400" /></div>
                        <div class="friends_desc">
                            <div class="friends_name">Martin</div>
                            <div class="friends_intro">
                           Martin是一个谜。同他聊天是一间有意思但是极富挑战性的事情，多数人都会以“你在说什么”告终。
从另一方面来说，Marti也是极富创造力的，美术课，聚会布置，乐高积木，在他手里都变得诡异却有趣。
你永远也猜不出来他在想什么，简直没有一点地球的气息。
                            </div>
                            <div class="friends_dream"><strong>梦想:</strong> 移民火星，造一座金字塔来住</div>
                        </div>
                    </div>
                    
                    <div id="friends_david" class="friends_item">
                        <div class="friends_big_pic"><img src="pic/friends/gallery/david.jpg" width="314" height="400" /></div>
                        <div class="friends_desc">
                            <div class="friends_name">David</div>
                            <div class="friends_intro">David is one of the star athletes at Happy Clover School. He holds the school record for fastest 100-meter dash and his legendary 'Crown Kick' is renowned for being unstoppable in football matches. David's sole goal in life is to win the first World Cup for his country.</div>
                        </div>
                    </div>
                    
                    <div id="friends_vinci" class="friends_item">
                        <div class="friends_big_pic"><img src="pic/friends/gallery/vinci.jpg" width="314" height="400" /></div>
                        <div class="friends_desc">
                            <div class="friends_name">Da Vinci</div>
                            <div class="friends_intro">
                           Da Vinci的爸爸和爷爷都是著名的艺术家。在这样的环境下长大，Da Vinci很早就坚定了她的梦想，并且非常努力的练习。
意大利的雷奥纳多·达·芬奇是她至高无上的崇拜对象，这种崇拜深入到她日常的一言一行。
“我不吃松饼，达芬奇也不喜欢”，“我需要练习画鸡蛋，达芬奇就是这么做的。”

                            </div>
                            <div class="friends_dream"><strong>梦想:</strong> 成为达芬奇，哦，我是说，成为大艺术家</div>
                        </div>
                    </div>
                    
                    <div id="friends_howie" class="friends_item">
                        <div class="friends_big_pic"><img src="pic/friends/gallery/howie.jpg" width="314" height="400" /></div>
                        <div class="friends_desc">
                            <div class="friends_name">Howie</div>
                            <div class="friends_intro">
                           Howie的个头在同龄人中大得多，从来没有人敢欺负他。而同他相处过的人都知道，Howie其实很胆小，害怕虫子，害怕棒球，害怕过马路，害怕关灯睡觉。
上体育课的时候你会看到一个穿着铠甲的大块头，那一定是Howie。
Howie记性不太好，常常会忘记带书本，却从来不会忘记带安全帽。喜欢的食物是双层芝士汉堡，还可以再加一层芝士和牛肉吗？
                            </div>
                            <div class="friends_dream"><strong>梦想:</strong> 额… 拳击手</div>
                        </div>
                    </div>
                    
                    <div id="friends_james" class="friends_item">
                        <div class="friends_big_pic"><img src="pic/friends/gallery/james.jpg" width="314" height="400" /></div>
                        <div class="friends_desc">
                            <div class="friends_name">James</div>
                            <div class="friends_intro">James is Happy Clover's other star athlete, whose prowess on the court has already earned him the title of "Future NBA All-Star". </div>
                        </div>
                    </div>
                    
                    <div id="friends_mia" class="friends_item">
                        <div class="friends_big_pic"><img src="pic/friends/gallery/mia.jpg" width="314" height="400" /></div>
                        <div class="friends_desc">
                            <div class="friends_name">Mia</div>
                            <div class="friends_intro">"Success is happiness" is the mantra of the smartest girl in school, Mia. Although she believes that success is measured in test scores and teacher appraisals, when Mia spends time with BOOMi, she learns about the joy of creativity, exploration and adventure.</div>
                        </div>
                    </div>
                    
                    <div id="friends_kiki" class="friends_item">
                        <div class="friends_big_pic"><img src="pic/friends/gallery/kiki.jpg" width="314" height="400" /></div>
                        <div class="friends_desc">
                            <div class="friends_name">Kiki</div>
                            <div class="friends_intro">
                           A self-proclaimed “domestic goddess”, Kiki literally eats, breathes and sleeps cookie dough – she brings a mini baking oven everywhere and jots down her fanciful creations in a recipe notebook. Kiki is happy to share her sweet convections with her schoolmates and teachers, with only one rule: they must finish every crumb or she throws a temper tantrum! </div>
                        </div>
                    </div>
                    
                    
                    
                    <div id="friends_queenie" class="friends_item">
                        <div class="friends_big_pic"><img src="pic/friends/gallery/queenie.jpg" width="314" height="400" /></div>
                        <div class="friends_desc">
                            <div class="friends_name">Queenie</div>
                            <div class="friends_intro">
                           Queenie是看起来特别安静害羞的女孩儿，不论到哪儿都会带着她的笔记本，忽然之间就抽出笔埋头写起来，眼睛闪闪发光，好像灵感都从那里涌出来了。
Queenie对魔法世界很着迷，遇见同好的时候会变得滔滔不绝。作为一个文学少女，Queenie的胆子却出乎意料地大，尤其爱坐过山车。
“好像骑着扫帚在飞。”她这么说。


                            </div>
                            <div class="friends_dream"><strong>梦想:</strong> 诺贝尔文学奖</div>
                        </div>
                    </div>
                    
                    <div id="friends_hao" class="friends_item">
                        <div class="friends_big_pic"><img src="pic/friends/gallery/hao.jpg" width="314" height="400" /></div>
                        <div class="friends_desc">
                            <div class="friends_name">Hao Hao</div>
                            <div class="friends_intro">
                           Small in size but big in ambition, Hao Hao longs to gain the recognition that his classmates earn for being smarter, funnier and more athletic than he is. Hao Hao feels the best way to get ahead of the competition is to eliminate it, which usually pits him head-to-head against BOOMi.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="friends_icon_box">
                	<ul class="jcarousel-skin-tango">
                    	<li><div class="box"><img title="Boomi" class="tips" style="left:4px;" src="pic/friends/icon/boomi.png" width="83" height="67" /></div></li>
                    	<li><div class="box"><img title="Hip" class="tips" style="left:16px;" src="pic/friends/icon/hip.png" width="63" height="103" /></div></li>
                    	<li><div class="box"><img title="Hop" class="tips" style="left:16px;" src="pic/friends/icon/hop.png" width="62" height="102" /></div></li>
                    	<li><div class="box"><img title="Martin" class="tips" style="left:16px;" src="pic/friends/icon/martin.png" width="61" height="93" /></div></li>
                    	<li><div class="box"><img title="David" class="tips" style="left:0;" src="pic/friends/icon/david.png" width="92" height="91" /></div></li>
                    	<li><div class="box"><img title="Vinci" class="tips" style="left:10px;" src="pic/friends/icon/vinci.png" width="77" height="68" /></div></li>
                    	<li><div class="box"><img title="Howie" class="tips" style="left:8px;" src="pic/friends/icon/howie.png" width="77" height="83" /></div></li>
                    	<li><div class="box"><img title="James" class="tips" style="left:8px;" src="pic/friends/icon/james.png" width="79" height="126" /></div></li>
                    	<li><div class="box"><img title="Mia" class="tips" style="left:10px;" src="pic/friends/icon/mia.png" width="72" height="87" /></div></li>
                    	<li><div class="box"><img title="Kiki" class="tips" style="left:0;" src="pic/friends/icon/kiki.png" width="93" height="70" /></div></li>
                    	<li><div class="box"><img title="Queenie" class="tips" style="left:14px;" src="pic/friends/icon/queenie.png" width="63" height="88" /></div></li>
                    	<li><div class="box"><img title="Hao Hao" class="tips" style="left:0;" src="pic/friends/icon/hao.png" width="95" height="68" /></div></li>
                    </ul>
                </div>
            </div>
        </section>
		<section class="section_box" id="section_5">
        	<div class="coming-soon-run">
        		<div class="coming-soon-text"></div>
        	</div>
        </section>

        <div class="clear"></div>
    </div>
    </div>
    <?php if ($page['footer']): ?>
		<?php print render($page['footer']); ?>
    <?php endif; ?>

	<footer>
		<div class="footer_wrap">
			<a class="trevor tips" href="http://trevorlai.com/" target="_blank" title="More information about Trevor Lai">Trevor</a>
	    	<a href="http://www.upstudios.cn" target="_blank" class="copyright">
	        	All content and characters Copyright 2013 by UP Studios and Trevor Lai. 
	        </a>
	        <div class="links"><a class="weibo tips" href="" target="_blank" title="Sina Weibo">Weibo</a></div>
		</div>
    </footer>
    
	<div id="bm_services_login_form_wrap" class="popup_box">
		<div class="popup_close"></div>
		<ul class="tab">
			<li class="actived">Login</li>
			<li>Register</li>
		</ul>
		<div id="bm_services_login_wrap">
			<form id="bm_services_login_form" action="<?php print $base_path; ?>index.php?q=superboomi_service/user/login" method="POST">
				<div class="filed_text">
					<label>Username or Email</label>
					<p><input name="username" type="text" /></p>
					<div class="error_msg"></div>
				</div>
				<div class="filed_text">
					<label>Password</label>
					<p><input name="password" type="password" /></p>
					<div class="error_msg"></div>
				</div>
				<div class="filed_text">
					<input type="checkbox" class="form-checkbox" value="1" name="remember_me" id="edit-remember-me" tabindex="1">  <label for="edit-remember-me" class="option">Remember me </label>
				</div>
				<div class="submit">
					<input type="submit" value="Login" id="bm_services_login"/>
					<a id="reg_in_login" href="javascript:void(0);">Register</a>
					<div class="submit_loading"></div>
				</div>
				<div class="login_error_msg error_msg"></div>
			</form>
			
			<form id="bm_services_forget_form" action="<?php print $base_path; ?>index.php?q=superboomi_service/user/simple_lostpassword" method="POST">
				<p class="status">Enter your email to find password</p>
				<div class="filed_text">
					<p><input name="mail" type="text" /></p>
					<div class="findpass_error_msg error_msg"></div>
				</div>
				<div class="submit">
					<input type="submit" value="Send" id="bm_services_findpass"/>
					<div class="submit_loading"></div>
				</div>
			</form>
		</div>
		<div id="bm_services_register_wrap">
			<form id="bm_services_register_form" action="<?php print $base_path; ?>index.php?q=superboomi_service/user/simple_create" method="POST">
				<div class="filed_text email_filed_text">
					<label>Email</label>
					<p><input name="mail" type="text" /></p>
					<div class="submit_loading"></div>
					<div class="error_msg"></div>
				</div>
				<div class="filed_text">
					<label>Username</label>
					<p><input name="name" type="text" /></p>
					<div class="error_msg"></div>
				</div>
				<div class="filed_text">
					<label>Password</label>
					<p><input name="pass" type="password" /></p>
					<div class="error_msg"></div>
				</div>
				<div class="filed_text">
					<label>Repeat Password</label>
					<p><input name="pass2" type="password" /></p>
					<div class="error_msg"></div>
				</div>
				<div class="submit">
					<input type="submit" value="Register" id="bm_services_register"/>
					<div class="submit_loading"></div>
				</div>
				<div class="reg_error_msg error_msg"></div>
			</form>
		</div>
	</div>
	
	<div class="overlay"></div>
	<div class="overlay2"></div>
	<div id="messsage_box"></div>
	<script>
	var userid = <?php print $user->uid; ?>;
	/*$(document).ready(function(){  
		var flipCurrent = 4;
		var flipItem = $('#flip li');
		$('#flip').css({left:-flipItem.eq(flipCurrent)[0].offsetLeft});
		flipItem.css({'opacity':0.5});
		flipItem.eq(flipCurrent).css({'opacity':1});
		flipItem.eq(flipCurrent).find('a').show();
		flipItem.click(function(){
			var index = $.inArray(this, flipItem);
			$('#flip').animate({left:-flipItem.eq(index)[0].offsetLeft});
			$('#photowall_home .pager a').removeClass('active');
			$('#photowall_home .pager a').eq(index).addClass('active');
			flipItem.css({'opacity':0.5});
			flipItem.eq(index).css({'opacity':1});
			flipCurrent = index;
			$('#flip a').hide();
			$(this).find('a').show();
		});
		flipItem.hover(function(){
			$(this).animate({'opacity':1});
		},function(){
			var index = $.inArray(this, flipItem);
			if(index != flipCurrent)
				$(this).animate({'opacity':0.5});
		});
		
		$("a[rel^='popup']").prettyPhoto({'default_width':400,'default_height':430,iframe_markup: '<iframe src ="{path}" width="{width}" height="{height}" frameborder="no" scrolling="no"></iframe>',social_tools:''});
	});*/
	</script>