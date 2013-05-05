	<footer>
		<div class="footer_wrap">
			<a class="trevor tips" href="http://trevorlai.com/" target="_blank" title="<?php print t('More information about Trevor Lai')?>">Trevor</a>
	    	<a href="http://www.upstudios.cn" target="_blank" class="copyright">
	        	All content and characters Copyright 2013 by UP Studios and Trevor Lai. 
	        </a>
	        <div class="links"><a class="weibo tips" href="http://weibo.com/superboomi" target="_blank" title="Sina Weibo">Weibo</a></div>
		</div>
    </footer>

<div id="bm_services_login_form_wrap" class="popup_box">
		<div class="popup_close"></div>
		<ul class="tab">
			<li class="actived"><?php print t('Login');?></li>
			<li><?php print t('Register');?></li>
		</ul>
		<div id="bm_services_login_wrap">
			<form id="bm_services_login_form" action="<?php print $base_path; ?>index.php?q=superboomi_service/user/login" method="POST">
				<div class="filed_text">
					<label><?php print t('Username or Email');?></label>
					<p><input name="username" type="text" /></p>
					<div class="error_msg"></div>
				</div>
				<div class="filed_text">
					<label><?php print t('Password');?></label>
					<p><input name="password" type="password" /></p>
					<div class="error_msg"></div>
				</div>
				<div class="filed_text">
					<input type="checkbox" class="form-checkbox" value="1" name="remember_me" id="edit-remember-me" tabindex="1">  <label for="edit-remember-me" class="option"><?php print t('Remember me');?> </label>
				</div>
				<div class="submit">
					<input type="submit" value="<?php print t('Login');?>" id="bm_services_login"/>
					<a id="reg_in_login" href="javascript:void(0);"><?php print t('Register');?></a>
					<div class="submit_loading"></div>
				</div>
				<div class="login_error_msg error_msg"></div>
			</form>
			
			<form id="bm_services_forget_form" action="<?php print $base_path; ?>index.php?q=superboomi_service/user/simple_lostpassword" method="POST">
				<p class="status"><?php print t('Enter your email to find password');?></p>
				<div class="filed_text">
					<p><input name="mail" type="text" /></p>
					<div class="findpass_error_msg error_msg"></div>
				</div>
				<div class="submit">
					<input type="submit" value="<?php print t('Send');?>" id="bm_services_findpass"/>
					<div class="submit_loading"></div>
				</div>
			</form>
		</div>
		<div id="bm_services_register_wrap">
			<form id="bm_services_register_form" action="<?php print $base_path; ?>index.php?q=superboomi_service/user/simple_create" method="POST">
				<div class="filed_text email_filed_text">
					<label><?php print t('Email');?></label>
					<p><input name="mail" type="text" /></p>
					<div class="submit_loading"></div>
					<div class="error_msg"></div>
				</div>
				<div class="filed_text">
					<label><?php print t('Username');?></label>
					<p><input name="name" type="text" /></p>
					<div class="error_msg"></div>
				</div>
				<div class="filed_text">
					<label><?php print t('Password');?></label>
					<p><input name="pass" type="password" /></p>
					<div class="error_msg"></div>
				</div>
				<div class="filed_text">
					<label><?php print t('Repeat Password');?></label>
					<p><input name="pass2" type="password" /></p>
					<div class="error_msg"></div>
				</div>
				<div class="submit">
					<input type="submit" value="<?php print t('Register');?>" id="bm_services_register"/>
					<div class="submit_loading"></div>
				</div>
				<div class="reg_error_msg error_msg"></div>
			</form>
		</div>
	</div>