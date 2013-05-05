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
        	<div class="coming-soon-run">
        		<div class="coming-soon-text"></div>
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
                            <div class="friends_intro">
                            BOOMi认为生活从来都不应当是无聊平凡的，每一天都可以无限精彩。<br/>
                            在BOOMi非凡的想象力中，他和他可爱的伙伴bibop历经着各种有趣的冒险，面对难题总能迸发出聪明才智。<br/>
                            “无限可能”，是BOOMi对待生活的关键词，同时也是他最大的弱点——当你有太多想法，就很容易迷失。<br/>
                            </div>
                            <div class="friends_dream"><strong>梦想:</strong> 只要有意思，什么都可以</div>
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
                            Hip的家族盛产双胞胎。他的爸爸妈妈，和爸爸的爸爸，都是双胞胎。尽管只早了一秒钟，Hip是绝对称职的哥哥。<br/>
                            Hip肚子里总有说不尽的笑话，加上非凡的表演天资，他一开口就会让你产生错觉，仿佛有聚光灯打在他身上。<br/>
                            如果Hip去做拉拉队队长的话，他支持的队伍一定士气高昂，不，没准最后没有人再关注比赛了，啦啦队包场。
                            </div>
                            <div class="friends_dream"><strong>梦想:</strong> 主持综艺节目，谐星</div>
                        </div>
                    </div>
                    
                    <div id="friends_hop" class="friends_item">
                        <div class="friends_big_pic"><img src="pic/friends/gallery/hop.jpg" width="314" height="400" /></div>
                        <div class="friends_desc">
                            <div class="friends_name">Hop</div>
                            <div class="friends_intro">
                            Hop和哥哥完全不同，他非常安静，很少说话，思维却十分活跃。<br/>
                            但凡由2个以上的部分拼合起来的东西，都会被Hop分开，再重组……虽然不是每一次都能回到原样。<br/>
                            Hop有他独特地交流方式。遥控车，机器人这类的机械玩具是最为他所用的工具，不过对精细的东西过于专注的Hop，常常会忽略运动。
                            </div>
                            <div class="friends_dream"><strong>梦想:</strong> Scientists, the great scientist</div>
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
                            <div class="friends_intro">
                           结实的身板，洪亮的嗓音，David可是存在感十足的人物。如果你遇到了麻烦，不用开口，David就会风驰电掣地出现。
David拥有标准的狮子的个性，在球场上更是具有独当一面的王者风范。
David喜欢大大的东西。大份的食物，大号的球衣，远大的梦想。要说缺点的话，就是不够细心。不过在大大的世界里，小东西都无所谓啦。


                            </div>
                            <div class="friends_dream"><strong>梦想:</strong> 得分王，金靴子，世界第一</div>
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
                            <div class="friends_intro">
                           James傲人的身高为他带来了不少优势，篮球队得分王，以及由此受到的来自女孩儿们的欢迎。甚至有球队星探发掘了这孩子，开始和James的父母商讨他的未来。
James习惯于顺风顺水的生活，学习也不怎么用功，因为他的脖子总能让他占据制高点，搜索到正确答案。
不过凡事有利有弊，比如鞋带松掉的时候，可是会让长脖子James抓狂的。

                            </div>
                            <div class="friends_dream"><strong>梦想:</strong> 模特吧，篮球队员也不错，嗯，还是模特更轻松。</div>
                        </div>
                    </div>
                    
                    <div id="friends_mia" class="friends_item">
                        <div class="friends_big_pic"><img src="pic/friends/gallery/mia.jpg" width="314" height="400" /></div>
                        <div class="friends_desc">
                            <div class="friends_name">Mia</div>
                            <div class="friends_intro">
                           Mia是标准的优等生，她一丝不苟，成绩永远名列前茅，渊博的知识令人赞叹。
Mia很少有表情变化，却绝不是冷漠的人。内心正直的她，从不畏惧站出头来，而面对他人的喜爱和感谢却显得腼腆甚至有些逃避。
独立，是Mia对自己的一贯的要求，因此她收起柔弱，不断地充实自己，让自己变得强大。


                            </div>
                            <div class="friends_dream"><strong>梦想:</strong> 成为优秀的独立女性</div>
                        </div>
                    </div>
                    
                    <div id="friends_kiki" class="friends_item">
                        <div class="friends_big_pic"><img src="pic/friends/gallery/kiki.jpg" width="314" height="400" /></div>
                        <div class="friends_desc">
                            <div class="friends_name">Kiki</div>
                            <div class="friends_intro">
                           这个时代男孩和女孩的差别越来越小，Kiki却是例外。只穿裙子，喜欢粉红色，总是微笑着给人暖暖的感觉。
Kiki喜欢厨房，喜欢在阳光很好的下午烤一箱cookie，装在漂亮的盒子里，再打上一个蝴蝶结带去给朋友们吃。
大家争着要cookie说好吃的时候，最令Kiki开心。不过拿到手的cookie一定要吃完，不然Kiki可是会生气的。

                            </div>
                            <div class="friends_dream"><strong>梦想:</strong> 拥有一间粉红色的面包店</div>
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
                           和他的家族一样， Hao Hao天生个头矮小，因为不想被人欺负，他总是摆出一副很容易生气的样子，好让人离他远一些。
Hao Hao对两样东西尤为在意，一样是所有属于他或者即将属于他的东西，另一样就是时间。
Hao Hao身上的大怀表是爸爸送他的礼物，他及其爱惜，虽然有时候会想，该不会因为表太重了压得长不高吧。


                            </div>
                            <div class="friends_dream"><strong>梦想:</strong> 造一个全世界最准确的钟</div>
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