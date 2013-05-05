<?php 
global $user;
?>
<header>
    	<div class="header_bg png">
            <div class="header_wrap png">
            	<div class="text_logo link2home"></div>
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
                <div class="userpanel">Welcome <a id="user_info" href="javascript:void(0);"><?php print_r($user->name);?></a> back！  <a id="changepass" href="javascript:void(0);">Change password</a> | <a href="<?php print $base_path?>user/logout">Logout</a></div>           
            	<?php endif;?>
            </div>
            <div class="language">
                <a href="#">中文</a>
            </div>
        </div>
    </header>
    <div class="page_container_box">
	    <div class="page_container">
	    	<div class="header"><?php print t('Update my account')?></div>
	        <?php print render($page['content']); ?>
	    </div>
    </div>
    <?php if ($page['footer']): ?>
	<?php print render($page['footer']); ?>
    <?php endif; ?>

	<footer>
		<div class="footer_wrap">
			<a class="trevor tips" href="http://trevorlai.com/" target="_blank" title="More information about Trevor Lai">Trevor</a>
	    	<div class="copyright">
	        	All content and characters Copyright 2012 by UP Studios and Trevor Lai. 
	        </div>
	        <div class="links"><a class="weibo tips" href="" target="_blank" title="Sina Weibo">Weibo</a></div>
		</div>
    </footer>
    <style>
    	.form-item-mail {display:none;}
    	.description {display:none;}
    	#edit-picture {display:none;}
    	.password-strength {display:none;}
    	div.password-confirm {display:none;}
    	.form-required {display:none;}
    </style>