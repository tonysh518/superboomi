var width;
var status2 = 0;
var navstatus = 0;
var cloud = 1;
var clicked = 0;
var upload = 0;
var currentIndex = 0;
$(document).ready(function(){  
	loadImg();
	loadCount();
	$("#photowall_banner a").prettyPhoto({'default_width':900,'default_height':271,social_tools:''});
    $('.photowall_right .box').fadeIn();
	// Address
	$.address.change(function(event) {  
		if(event.pathNames[0] == 'c_home')
		{
			move2home();
		}
		if(event.pathNames[0] == 'c_photowall')
		{
			move2photowall();
		}
		if(event.pathNames[0] == 'c_readwatch')
		{
			move2readwath();
		}
		if(event.pathNames[0] == 'c_playmake')
		{
			move2playmake();
		}
        if(event.pathNames[0] == 'c_storyidea')
        {
            move2storyidea();
        }
		if(event.pathNames[0] == 'c_friends')
		{
			move2friends();
		}
		if(event.pathNames[0] == 'c_upclub')
		{
			move2club();
		}
		if(event.pathNames[0] == 'c_upload')
		{
			move2photowall();
			openUpoadbox();
		}
	});  

	$('.tips').tipsy({gravity: 'se'});

	$("input[type='checkbox']").uniform();
	$(document).bind("contextmenu",function(e){   
        return false;   
	});
	
	if($('#flip').length>0)
	{
		var flipCurrent = 0;
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
		$('body').keyup(function(event) {
			if(!$('#topNav a').hasClass('actived'))
			{
				var thisPage = $('#photowall_home .pager a.active');
				if(event.which == 39)
				{
					if(thisPage.next().length>0)
						thisPage.next().click();
					else
						$('#photowall_home .pager a').eq(0).click();
				}
				if(event.which == 37)
				{
					
					if(thisPage.prev().length>0)
						thisPage.prev().click();
					else
						$('#photowall_home .pager a').last().click();
				}
			}
		});
		var autoSlider = setInterval(autoHomeSlider,4000);
		$('#flip').hover(function(){
			clearInterval(autoSlider);
		},function(){
			autoSlider = setInterval(autoHomeSlider,4000);
		});
		$('#photowall_home .pager a').click(function(){
			var index = $.inArray(this,$('#photowall_home .pager a'));
			$('#flip li').eq(index).trigger('click');
		});	
	}
	
	if($('body').hasClass('front'))
		$('body').css('overflow','hidden');
	
	$('.find_photo').click(function(){
		if($(this).css('right') == '-270px')
			$('.find_photo').animate({'right':0});
		else
			$('.find_photo').animate({'right':-270});
	});
	$('body').click(function(e){
		if(e.target.className != 'trigger')
			$('.find_photo').animate({'right':-270});
	});
	$('.find_photo').mouseenter(function(){
		$(this).find('.trigger').animate({'opacity':1});
	});
	$('.find_photo').mouseleave(function(){
		$(this).find('.trigger').animate({'opacity':0});
	});

    $('#topNav li').hover(function(){
        $(this).find('ul').fadeIn(200);
    },function(){
        $(this).find('ul').fadeOut(200);
    });
	//var navPos = new Array(47,186,326,442,642);
//	var topNavLink = $('#topNav>li>a');
//	$('#topNav li').mouseenter(function(){
//		var index = $.inArray(this,$('#topNav>li'));
//		$('.nav_arrow').clearQueue().animate({'left':navPos[index]});
//		showBearLogo(index+1);
//	});
//	$('#topNav li').mouseleave(function(){
//		$('.nav_arrow').clearQueue().delay(500).animate({'left':navPos[navstatus]});
//		showBearLogo(navstatus+1);
//	});
//	$('#topNav a').click(function(){
//		var href = $(this).attr('href');
//		$.scrollTo( href, 800 );		
//		var index = $.inArray(this,topNavLink);
//		navstatus = index;
//		activeTopNav(index);
//		//$('.nav_arrow').clearQueue().delay(810).animate({'left':navPos[index]});
//		clicked = 1;
//		setTimeout(function(){
//			clicked = 0;
//		},1000);
//		showBearLogo(index+1);
//		return false;
//	});

	//$(window).scroll(function () {
//		if(clicked == 0)
//		{
//			var scollTop = $(window).scrollTop();
//			if(scollTop < 80)
//			{
//				showBearLogo(1);
//				activeTopNav(0);
//				
//			}
//			if(scollTop > 500)
//			{
//				showBearLogo(2);
//				activeTopNav(1);
//			}
//			if(scollTop > 1320)
//			{
//				showBearLogo(3);
//				activeTopNav(2);
//			}
//			if(scollTop > 2030)
//			{
//				showBearLogo(4);
//				activeTopNav(3);
//			}
//			if(scollTop > 2740)
//			{
//				showBearLogo(5);
//				activeTopNav(4);
//			}
//		}
//		//fit to position
//		homeMoving(scollTop);
//		screen2Moving(scollTop);
//    });

	getWindowSize();
	$(window).resize(getWindowSize);
	$('#link2appwal2l').click(function(){
		
	});
	
	
	//back home
	$('.link2home').click(function(){
		window.location.hash='c_home';
	});
	
	
	

	$('#section1_1 .slides,#section2_1 .slides2').slides({
		preload: true,
		play: 5000,
		pause: 2500,
		hoverPause: true,
		animationStart: function(current){
			$('.caption').animate({
				bottom:-35
			},100);
			
		},
		animationComplete: function(current){
			$('.caption').animate({
				bottom:0
			},200);
		},
		slidesLoaded: function() {
			$('.caption').animate({
				bottom:0
			},200);
		}
	});
	
	hoverIntentCfg = {
		over: function(){
			$(this).find('.subnav').css({'opacity':0,'display':'block'}).animate({'height':28, 'opacity':1},300);
		},
		timeout: 500, 
		out: function(){
			$(this).find('.subnav').animate({'opacity':0,height:0},200,function(){
				$(this).hide();
			});
		} 
	};
	$('#topNav li').hoverIntent(hoverIntentCfg);	
		
	
	//popup vote
	$('.app_item_popup input').live('click',function(){
		var popupbox = $('.app_item_popup');
		$('.app_item_popup #vote_text').remove();
		var pic = popupbox.find('.pic');
		var name = $(this).attr('name');
		pic.append("<div id='vote_text' class='"+name+"'></div>");
		var text = popupbox.find('#vote_text');
		text.clearQueue().css({'opacity':0}).animate({opacity:1,'top':0},function(){
			text.delay(2000).fadeOut(function(){
				$(this).remove();
			});
		});		
	});
	
	
	$('.ui-jcoverflip--item').hover(function(){
		if($(this).css('left') != '0px'){
			$(this).css({'opacity':1});
		}
	},function(){
		if($(this).css('left') != '0px'){
			$(this).css({'opacity':0.7});
		}
	});
	
	//cloud moving
	setInterval(function(){
		$('#section1').css({'background-position':cloud});
		cloud++;
	},60);

	
	
	//var photowall_left_arrow_shining_interval;
	$('#photowall_left_arrow').click(function(){
		if($(this).hasClass('opened')){
			$('.photowall_left').animate({'left':-185});
			$('.photowall_right').animate({'margin-left':15},function(){
				var $container = $('#photowall_container');
				$container.masonry('reload');
			});
			$(this).removeClass('opened');
			//photowall_left_arrow_shining_interval = setInterval(function(){
			//	$('#photowall_left_arrow').animate({'background-color':'#ffbc53'},400);
			//	$('#photowall_left_arrow').delay(400).animate({'background-color':'#FFAC54'},400);
			//},2000);
		}
		else
		{
			$('.photowall_left').animate({'left':0});
			$('.photowall_right').animate({'margin-left':195},function(){
				var $container = $('#photowall_container');
				$container.masonry('reload');
			});
			$(this).addClass('opened');
			//clearInterval(photowall_left_arrow_shining_interval);
		}
	});
	
	$('.box').live('mouseenter',function(){
		$(this).find('.desc').animate({'bottom':-33}, {
			duration: 700,
			easing: 'easeOutElastic'
		});
	});
	$('.box').live('mouseleave',function(){
		$(this).find('.desc').animate({'bottom':-88});
	});
	
	
	$('.upload_btn').click(function(){
		$('.overlay').css('opacity',0.8).fadeIn();
		var height = ($(window).height() - $('#bm_services_uploadbox_wrap').height() - 20)/2;
		var width = ($(window).width() - $('#bm_services_uploadbox_wrap').width() - 20)/2;
		$('#bm_services_uploadbox_wrap').css({'bottom':'-25%','left':width,'opacity':0, 'display':'block'}).stop().animate({'bottom':height,'opacity':1},500);
		$('#bm_services_upload_picture_form').css('margin',0);
		//$('#bm_services_upload_picture_form .submit').show();
		$('#bm_services_upload_picture_form .uploading').hide();
		$('#bm_services_upload_picture_form .file img').remove();
		$('#bm_services_upload_picture_form .file').removeClass('selected');
	});
		
	$('.upload2').bind('click',function(){
		upload = 1;
	});
		
	//user login/register tab
	$('#bm_services_login_form_wrap .tab li').eq(0).click(function(){
		$('#bm_services_login_form_wrap .tab li').removeClass('actived');
		$(this).addClass('actived');
		$('#bm_services_login_form_wrap').css({'height':$('#bm_services_login_form_wrap').height()});
		$('#bm_services_register_wrap').fadeOut(400);
		$('#bm_services_login_wrap').delay(420).fadeIn(400,function(){
			$('#bm_services_login_form_wrap').stop().animate({'height':$('#bm_services_login_form').height()},200,function(){
				$(this).css({'height':'auto'});
				var height = ($(window).height() - $(this).height())/2;
				$(this).animate({'bottom':height});
			});
		});
	});
	$('#bm_services_login_form_wrap .tab li').eq(1).click(function(){
		$('#bm_services_login_form_wrap .tab li').removeClass('actived');
		$(this).addClass('actived');
		$('#bm_services_login_form_wrap').css({'height':$('#bm_services_login_form_wrap').height()});
		$('#bm_services_login_wrap').fadeOut(400);
		$('#bm_services_login_form_wrap').stop().animate({'height':$('#bm_services_register_wrap').height()},200,function(){
			
			$('#bm_services_register_wrap').delay(420).fadeIn(400,function(){
				$('#bm_services_login_form_wrap').css({'height':'auto'});
				var height = ($(window).height() - $('#bm_services_login_form_wrap').height())/2;
				$('#bm_services_login_form_wrap').animate({'bottom':height});
			});
		});
	});
	
	$('.login_btn').click(function(){
		$('#bm_services_login_form').show();
		$('#bm_services_forget_form').hide();
		$('.login_error_msg').hide();
		$('.overlay').css('opacity',0.8).fadeIn();
		$('#bm_services_login_form_wrap .tab li').removeClass('actived');
		$('#bm_services_login_form_wrap .tab li').eq(0).addClass('actived');
		$('#bm_services_login_wrap').show();
		$('#bm_services_register_wrap').hide();
		var height = ($(window).height() - $('#bm_services_login_form_wrap').height() - 60)/2;
		var width = ($(window).width() - $('#bm_services_login_form_wrap').width())/2-100;
		$('#bm_services_login_form_wrap').css({'bottom':'-25%','left':width,'opacity':0, 'display':'block'}).stop().animate({'bottom':height,'opacity':1},500);
	});
	$('.register_btn').click(function(){
		$('.overlay').css('opacity',0.8).fadeIn();
		$('#bm_services_login_form_wrap .tab li').removeClass('actived');
		$('#bm_services_login_form_wrap .tab li').eq(1).addClass('actived');
		$('#bm_services_register_wrap').show();
		$('#bm_services_login_wrap').hide();
		var height = ($(window).height() - $('#bm_services_login_form_wrap').height() - 60)/2;
		var width = ($(window).width() - $('#bm_services_login_form_wrap').width())/2-100;
		$('#bm_services_login_form_wrap').css({'bottom':'-25%','left':width,'opacity':0, 'display':'block'}).stop().animate({'bottom':height,'opacity':1},500);
	});
	
	//userpane tab
	$('#bm_services_userpane_wrap .tab li').eq(0).click(function(){
		$('#bm_services_userpane_wrap .tab li').removeClass('actived');
		$(this).addClass('actived');
		$('#bm_services_userpane_wrap').css({'height':$('#bm_services_userpane_wrap').height()});
		$('#bm_services_userpass_wrap').fadeOut(400);
		$('#bm_services_username_wrap').fadeOut(400);
		$('#bm_services_useravator_wrap').delay(450).fadeIn(400,function(){
			$('#bm_services_userpane_wrap').stop().animate({'height':$('#bm_services_useravator_wrap').height()},200,function(){
				$(this).css({'height':'auto'});
				var height = ($(window).height() - $(this).height())/2;
				$(this).animate({'bottom':height});
			});
		});
	});
	$('#bm_services_userpane_wrap .tab li').eq(1).click(function(){
		$('#bm_services_userpane_wrap .tab li').removeClass('actived');
		$(this).addClass('actived');
		$('#bm_services_userpane_wrap').css({'height':$('#bm_services_userpane_wrap').height()});
		$('#bm_services_useravator_wrap').fadeOut(400);
		$('#bm_services_username_wrap').fadeOut(400);
		$('#bm_services_userpass_wrap').delay(420).fadeIn(400,function(){			
			$('#bm_services_userpane_wrap').stop().animate({'height':$('#bm_services_userpass_wrap').height()},200,function(){
				$(this).css({'height':'auto'});
				var height = ($(window).height() - $(this).height())/2;
				$(this).animate({'bottom':height});
			});
		});
	});
	$('#bm_services_userpane_wrap .tab li').eq(2).click(function(){
		$('#bm_services_userpane_wrap .tab li').removeClass('actived');
		$(this).addClass('actived');
		$('#bm_services_userpane_wrap').css({'height':$('#bm_services_userpane_wrap').height()});
		$('#bm_services_useravator_wrap').fadeOut(400);
		$('#bm_services_userpass_wrap').fadeOut(400);
		$('#bm_services_username_wrap').delay(420).fadeIn(400,function(){
			$('#bm_services_userpane_wrap').stop().animate({'height':$('#bm_services_username_wrap').height()},200,function(){
				$(this).css({'height':'auto'});
				var height = ($(window).height() - $(this).height())/2;
				$(this).animate({'bottom':height});
			});
		});
	});
	
	$('.overlay').click(function(){
		$(this).fadeOut();
		$('.popup_box').fadeOut();
	});
	
	$('#bm_services_uploadbox_wrap .popup_close,#bm_services_uploadbox_wrap .close').click(function(){
		$('#bm_services_uploadbox_wrap').fadeOut();
		$('.overlay').fadeOut();
	});
	
	$('#bm_services_login_form_wrap .popup_close').click(function(){
		$('#bm_services_login_form_wrap').fadeOut();
		$('.overlay').fadeOut();
	});
	
	$('#bm_services_register_form_wrap .popup_close').click(function(){
		$('#bm_services_register_form_wrap').fadeOut();
		$('.overlay').fadeOut();
	});
	
	$('.avator').hover(function(){
		$(this).find('.change_avator').css('opacity',0.95).fadeIn();
	},function(){
		$(this).find('.change_avator').fadeOut();
	});
	$('.photowall_left .change_avator,#user_info').click(function(){
		$('#bm_services_userpane_wrap .tab li').removeClass('actived');
		$('#bm_services_userpane_wrap .tab li').eq(0).addClass('actived');
		$('#bm_services_useravator_wrap').show();
		$('#bm_services_userpass_wrap').hide();
		var height = ($(window).height() - $('#bm_services_userpane_wrap').height() - 60)/2;
		var width = ($(window).width() - $('#bm_services_userpane_wrap').width())/2;
		$('#bm_services_userpane_wrap').css({'bottom':'-25%','left':width,'opacity':0, 'display':'block'}).stop().animate({'bottom':height,'opacity':1},500);
		$('#bm_services_userpane_wrap').fadeIn();
		$('.overlay').css('opacity',0.8).fadeIn();
	});
	
	$('.editprofile').click(function(){
		$('#bm_services_userpane_wrap .tab li').removeClass('actived');
		$('#bm_services_userpane_wrap .tab li').eq(2).addClass('actived');
		$('#bm_services_username_wrap').show();
		$('#bm_services_userpass_wrap').hide();
		$('#bm_services_useravator_wrap').hide();
		var height = ($(window).height() - $('#bm_services_userpane_wrap').height())/2;
		var width = ($(window).width() - $('#bm_services_userpane_wrap').width())/2-100;
		$('#bm_services_userpane_wrap').css({'bottom':'-25%','left':width,'opacity':0, 'display':'block'}).stop().animate({'bottom':height,'opacity':1},500);
		$('#bm_services_userpane_wrap').fadeIn();
		$('.overlay').css('opacity',0.8).fadeIn();
	});
	
	$('#bm_services_userpane_wrap .popup_close,#bm_services_userpane_wrap .close').click(function(){
		$('#bm_services_userpane_wrap').fadeOut();
		$('.overlay').fadeOut();
		location.reload();
	});
	
	$('#bm_services_register_form input[name="mail"]').change(function(){
		var mail = $(this).val();
		var username = mail.split('@');
		$('#bm_services_register_form input[name="name"]').val(username[0]);
		$('.email_filed_text .submit_loading').fadeIn();
		var request = $.ajax({
		  url: "?q=superboomi_service/user/simple_login",
		  type: "POST",
		  data: {mail : mail},
		  dataType: "json"
		}).done(function(msg) {
			if(msg.code != 500)
			{
				$('#bm_services_register_form input[name="mail"]').parents('.filed_text').find('.error_msg').html('This email was registered.').fadeIn();
			}
		  	$('.email_filed_text .submit_loading').fadeOut();
		});
	});
	
	
	//user wall
	$('.user_wall .like').html('<img src="images/like_s.png" />');
	$('.user_wall .user').html('your');
	
	
	
	//form 
	$('#bm_services_upload_picture_crop_form').ajaxForm({
		beforeSubmit: function() {
			$('#bm_services_upload_picture_crop_form .submit').hide();
			$('#bm_services_upload_picture_crop_form .uploading').show();
		},
		complete: function(xhr) {
			$('#bm_services_upload_picture_crop_form .crop img').imgAreaSelect({ hide: true });
			json = $.parseJSON(xhr.responseText);
			$('#bm_services_upload_picture_form').animate({'margin-top':-645});
		}
	});
	
	$('#bm_services_upload_picture_form').ajaxForm({
		uploadProgress: function(event, position, total, percentComplete) {
			$('#bm_services_upload_picture_form .submit').hide();
			$('#bm_services_upload_picture_form .uploading').show();
		},
		complete: function(xhr) {
			json = $.parseJSON(xhr.responseText);
			if(json.uri)
			{
				$('#bm_services_upload_picture_form').animate({'margin-top':-315},function(){
					$('#bm_services_upload_picture_crop_form input[name="nid"]').val(json.nid);
					var newImg = new Image();
				    newImg.src = json.uri;
					newImg.onload = function(){
						if(newImg.width > newImg.height)
						{
							ratio =  newImg.width/newImg.height;
							newWidth = 270;
							newHeight = 270/ratio;
						}
						else
						{
							ratio =  newImg.height/newImg.width;
							newHeight = 200;
							newWidth = 200/ratio;
						}
						
						$('#bm_services_upload_picture_crop_form .crop').html('<img src="'+json.uri+'" width="'+newWidth+'" height="'+newHeight+'" />');
						$('#bm_services_upload_picture_crop_form .crop img').load(function(){
							var edge;
							var width = $(this).width();
							var height = $(this).height();
							if(width > height)
							{
								edge = height;
								x = (width - edge)/2;
								y = 0;
							}
							else
							{
								edge = width;
								x = 0;
								y = (height - edge)/2;
							}
							// real size : resized size
							sizeRation = newImg.width/newWidth;
							// console.log(sizeRation);
							$('#bm_services_upload_picture_crop_form .crop img').imgAreaSelect({ aspectRatio: '1:1',x1: x, y1: y, x2: x+edge, y2: y+edge ,
								onSelectStart: function () {
									$('#bm_services_upload_picture_crop_form input[name="x"]').val(x*sizeRation);
									$('#bm_services_upload_picture_crop_form input[name="y"]').val(y*sizeRation);
									$('#bm_services_upload_picture_crop_form input[name="width"]').val(edge*sizeRation);
								},
								onSelectEnd: function (img, selection) {
									$('#bm_services_upload_picture_crop_form input[name="x"]').val(selection.x1*sizeRation);
									$('#bm_services_upload_picture_crop_form input[name="y"]').val(selection.y1*sizeRation);
									$('#bm_services_upload_picture_crop_form input[name="width"]').val((selection.x2-selection.x1)*sizeRation);
								}
							});
						});
				    }
				});
				
			}
			//$('#bm_services_upload_picture_form').animate({'margin-top':-343});
		}
	});
	
	//update user picture
	$('#bm_services_userpicture_form').ajaxForm({
		uploadProgress: function(event, position, total, percentComplete) {
			$('#bm_services_userpicture_form .submit').hide();
			$('#bm_services_userpicture_form .uploading').show();
		},
		complete: function(xhr) {
			json = $.parseJSON(xhr.responseText);
			if(json.uri)
			{
				$('#bm_services_userpicture_form').animate({'margin-top':-335},function(){
					$('#bm_services_userpicture_crop_form input[name="uri"]').val(json.uri);
					var newImg = new Image();
				    newImg.src = json.url;
					newImg.onload = function(){
						if(newImg.width > newImg.height)
						{
							ratio =  newImg.width/newImg.height;
							newWidth = 270;
							newHeight = 270/ratio;
						}
						else
						{
							ratio =  newImg.height/newImg.width;
							newHeight = 200;
							newWidth = 200/ratio;
						}
						
						$('#bm_services_userpicture_crop_form .crop').html('<img src="'+json.url+'" width="'+newWidth+'" height="'+newHeight+'" />');
						$('#bm_services_userpicture_crop_form .crop img').load(function(){
							var edge;
							var width = $(this).width();
							var height = $(this).height();
							if(width > height)
							{
								edge = height;
								x = (width - edge)/2;
								y = 0;
							}
							else
							{
								edge = width;
								x = 0;
								y = (height - edge)/2;
							}
							// real size : resized size
							sizeRation = newImg.width/newWidth;
							// console.log(sizeRation);
							$('#bm_services_userpicture_crop_form .crop img').imgAreaSelect({ aspectRatio: '1:1',x1: x, y1: y, x2: x+edge, y2: y+edge ,
								onSelectStart: function () {
									$('#bm_services_userpicture_crop_form input[name="x"]').val(x*sizeRation);
									$('#bm_services_userpicture_crop_form input[name="y"]').val(y*sizeRation);
									$('#bm_services_userpicture_crop_form input[name="width"]').val(edge*sizeRation);
									$('#bm_services_userpicture_crop_form input[name="height"]').val(edge*sizeRation);
								},
								onSelectEnd: function (img, selection) {
									$('#bm_services_userpicture_crop_form input[name="x"]').val(selection.x1*sizeRation);
									$('#bm_services_userpicture_crop_form input[name="y"]').val(selection.y1*sizeRation);
									$('#bm_services_userpicture_crop_form input[name="width"]').val((selection.x2-selection.x1)*sizeRation);
									$('#bm_services_userpicture_crop_form input[name="height"]').val((selection.y2-selection.y1)*sizeRation);
								}
							});
						});
				    }
				});
			}
		}
	});
	
	$('#bm_services_userpicture_crop_form').ajaxForm({
		beforeSubmit: function() {
			$('#bm_services_userpicture_crop_form .submit').hide();
			$('#bm_services_userpicture_crop_form .uploading').show();
		},
		complete: function(xhr) {
			$('#bm_services_userpicture_crop_form .crop img').imgAreaSelect({ hide: true });
			json = $.parseJSON(xhr.responseText);
			$('#bm_services_userpicture_form').animate({'margin-top':-636});
		}
	});
	
	//login
	$('#bm_services_login_form').ajaxForm({
		beforeSubmit:  function(){
			return $("#bm_services_login_form").valid();
		},
		complete: function(xhr) {
			json = $.parseJSON(xhr.responseText);
			//console.log(json);
			$('.submit_loading').fadeOut();
			if(xhr.status == 401)
			{
				$('.login_error_msg').html('Wrong username or password. <div class="forgotpass">Forget password?</div>').fadeIn();
			}
			if(json.sessid != '' && json.sessid != undefined)
			{
				if(upload == 1)
				{
					location.hash = "index.php#c_upload";
					location.reload();
					return;
				}
				else
				{
					location.hash = "index.php#c_photowall";
					location.reload();
					return;
				}
			}
		}
	});
	
	$("#bm_services_login_form").validate(
	{
		invalidHandler : function(){
		   getWindowSize();
	   },
	   rules: {
		   username: { required: true},
		   password: { required: true}
	   },
	   messages: {
		   username: 'Please enter username or email.',
		   password: 'Please enter password.'
		}
	});
	
	//change pass
	$('#bm_services_user_pass_form').ajaxForm({
		beforeSubmit:  function(){
			return $("#bm_services_user_pass_form").valid();
		},
		complete: function(xhr) {
			json = $.parseJSON(xhr.responseText);
			//console.log(json);
			location.reload();
			
		}
	});
	
	$("#bm_services_user_pass_form").validate(
	{
		invalidHandler : function(){
		   getWindowSize();
	   },
	   rules: {
		   pass: {required:true},
		   pass2: {required:true, equalTo: '#bm_services_user_pass_form input[name="pass"]'}
	   },
	   messages: {
		   pass: 'Please enter password',
		   pass2: {required: 'Please enter confirm password', equalTo:'Password are not same'}
		}
	});
	
	//change username
	$('#bm_services_username_form').ajaxForm({
		beforeSubmit:  function(){
			return $("#bm_services_username_form").valid();
		},
		complete: function(xhr) {
			json = $.parseJSON(xhr.responseText);
			//console.log(json);
			location.reload();
			
		}
	});
	
	$("#bm_services_username_form").validate(
	{
		invalidHandler : function(){
		   getWindowSize();
	   },
	   rules: {
		   username: {required:true}
	   },
	   messages: {
		   username: 'Please enter password'
		}
	});
	
	//register
	$('#bm_services_register_form').ajaxForm({
		beforeSubmit:  function(){
			return $("#bm_services_register_form").valid();
		},
		complete: function(xhr) {
			json = $.parseJSON(xhr.responseText);
			if(json.mail)
			{
				var username = $('#bm_services_register_form input[name="name"]');
				var password = $('#bm_services_register_form input[name="pass"]');
				$.ajax({
				  url: "?q=superboomi_service/user/login",
				  type: "POST",
				  data: {username : username.val(), password: password.val()},
				  dataType: "json"
				}).done(function(msg) {
					//console.log(msg);
					if(msg.sessid != '' && msg.sessid != undefined)
					{
						location.reload();
					}
				});
			}
			else
			{
				$('.reg_error_msg').html('Please try later.');
			}
		}
	});

	$("#bm_services_register_form").validate(
	{
	   invalidHandler : function(){
		   getWindowSize();
	   },
	   rules: {
		   mail: {required:true, email: true},
		   name: {required:true},
		   pass: {required:true},
		   pass2: {required:true, equalTo: '#bm_services_register_form input[name="pass"]'}
	   },
	   messages: {
		   mail: 'Mail address not correct.',
		   name: 'Please enter username',
		   pass: 'Please enter password',
		   pass2: {required: 'Please enter confirm password', equalTo:'Password are not same'}
		}
	});
	
	//find password
	$('.forgotpass').live('click',function(){
		$('#bm_services_login_form').fadeOut(400);
		$('#bm_services_forget_form').delay(400).fadeIn(400);
	});
	$('#bm_services_forget_form').ajaxForm({
		beforeSubmit:  function(){
			return $("#bm_services_forget_form").valid();
			$('.findpass_error_msg').fadeOut();
		},
		complete: function(xhr) {
			json = $.parseJSON(xhr.responseText);
			//$('.submit_loading').fadeOut();
			if(json.code == 500)
			{
				$('.findpass_error_msg').html('Email address doesn\'t exist.').fadeIn();
			}
			if(json.mailed == 1)
			{
				$('#bm_services_forget_form .status').html('Please check your email, find link to change password.');
				$('#bm_services_forget_form .filed_text').fadeOut();
				$('#bm_services_forget_form .submit').fadeOut();
			}
//			if(json.sessid != '' && json.sessid != undefined)
//			{
//				location.reload();
//			}
		}
	});
	
	$("#bm_services_forget_form").validate(
	{
	   rules: {
		   mail: {required:true, email: true}
	   },
	   messages: {
		   mail: 'Mail address not correct.'
		}
	});
	
	
	
	$('.photowall_category_icons a,.cate_cover_item a').click(function(e){
        e.preventDefault();
		var url = $(this).attr('href');
		$('.photowall_category_icons a').removeClass('actived');
		$(this).addClass('actived');
		$('.overlay2').fadeIn();
		$('#messsage_box').html('<img src="http://www.superboomi.com/images/photowall_loading.gif" />').fadeIn();
		$container = $('#photowall_container');
		$container.infinitescroll('destroy');
		$container.infinitescroll({                      
		   state: {
			  isDestroyed: false,
			  isDone: false,
			  isDuringAjax: false
		   }
		});
		if($(this).attr('original-title')=="All")
		{
			$('.cate_cover').fadeIn();
		}
		$container.fadeOut(function(){
			$container.masonry( 'destroy');
			$(this).empty();
			$.ajax({
			  url: url,
			  type: "GET",
			  dataType: "html"
			}).done(function(msg) {
				//console.log(msg);
				$('.overlay2').fadeOut();
				$('#messsage_box').fadeOut();
				$newElems = $(msg).find('.box').css({ opacity: 0 });
				$container = $('#photowall_container').append($newElems);
				$newElems.imagesLoaded(function(){
				$("a[rel^='popup']").prettyPhoto({'default_width':400,'default_height':430,iframe_markup: '<iframe src ="{path}" width="{width}" height="{height}" frameborder="no" scrolling="no"></iframe>',social_tools:''});			  
				  $newElems.animate({ opacity: 1 });
				  $container.fadeIn();
                    $('.photowall_right .box').fadeIn();
				$container.infinitescroll({
				  itemSelector : '.box',     // selector for all items you'll retrieve
				  loading: {
					  msgText: 'Loading'
					},
					state: {
					  currPage: 0 // The number of the first comment page loaded, you can generate this number dynamically to save changing it manually
					},
					path: [url+'?page=','']
				  },function(){
                        $('#photowall_container .box').delay(1000).fadeIn();
                    }
				);
				$container.infinitescroll('bind');
				
				});
						
			});
		});
		return false;
	});
	
	
	//friend
	var friend_icon = $('.friends_icon_box li');
	friend_icon.eq(0).addClass('active');
	friend_icon.click(function(){
		var index = $.inArray(this,friend_icon);
		$('.friends_item').fadeOut(400);
		$('.friends_item').eq(index).delay(400).fadeIn(400);
		friend_icon.removeClass('active');
		$(this).addClass('active');
	});
	
	$('.friends_more_pic img').click(function(){
		var thisPics = $(this).parents('.friends_item').find('.friends_more_pic img');
		var index = $.inArray(this, thisPics);
		var bigPics = $(this).parents('.friends_item').find('.friends_big_pic img');
		bigPics.fadeOut();
		bigPics.eq(index).fadeIn();
	});
	
	$('.friends_more_btn').click(function(){
		if(!$(this).hasClass('friends_more_btn_zoomout'))
		{
			$(this).parents('.friends_item').find('.friends_more_pic_wrap').animate({'left':0});
			$(this).addClass('friends_more_btn_zoomout');
		}
		else
		{
			$(this).parents('.friends_item').find('.friends_more_pic_wrap').animate({'left':-138});
			$(this).removeClass('friends_more_btn_zoomout');
		}
	});
	
	$('.friends_icon_box ul').jcarousel();
	
	$('body').keyup(function(event) {
		if($('#topNav .nav4 a').hasClass('actived'))
		{
			var thisPage = $('.friends_icon_box li.active');
			var friend_index = friend_icon.index(thisPage) + 1;
			if(event.which == 39)
			{
				if(thisPage.next().length>0)
					thisPage.next().click();
				if(friend_index == 8 || friend_index == 11)
					$('.friends_icon_box .jcarousel-next').click();
			}
			if(event.which == 37)
			{
				
				if(thisPage.prev().length>0)
					thisPage.prev().click();
				if(friend_index == 5 || friend_index == 2)
					$('.friends_icon_box .jcarousel-prev').click();
			}
		}
	});
	
	if ($.browser.msie) {
        if ($.browser.version == "6.0"){
        	$('body').append('<div class="updateie">You are using ie6, please upgrade to newer version to get best experience.</div>');
        }
    }
});

function showBearLogo(id){
	var index = $.inArray($('.logo div.active'),$('.logo div'));
	if(index+1 != id)
	{
		$('.logo div').removeClass('active');
		$('.logo .logo_bear'+id).addClass('active');
		$('.logo div').hide();
		$('.logo .logo_bear'+id).show();
		$('.logo_bg div').removeClass('active');
		$('.logo_bg .logo_bg'+id).addClass('active');
		$('.logo_bg div').hide();
		$('.logo_bg .logo_bg'+id).show();
	}
}

function getWindowSize(){

	var width = $(window).width() - 209;
	var num = Math.floor(width/207);
	var realwidth = num*207;
	$('#photowall_container').css('width',realwidth);

	//width = $(window).width();
//	var size = parseInt((width-100) / (177+80));
//	var boxmagin = parseInt((((width-100)-177*size)/size)/2);
//	$('.section1_box, .section2_box').css({'width':width});
//	$('.section_width_wrap1').css({'margin-left':-width*status2});
//	
//	$('.app_item').css({'margin-left':boxmagin,'margin-right':boxmagin});
//	var i = 0;
//	var p = 0;
//	$('#section1_2 .slides_container').html('');
//	$('.slide_repository .app_item').each(function(){
//		if(i%(size*2)==0)
//		{
//			$('#section1_2 .slides_container').append("<div class='slide' />");
//			p ++;
//		}
//		i++;
//		$(this).clone().appendTo($('#section1_2 .slide').eq(p-1));
//	});
//	
//	$('#section1_2 .slide').css({'width':(width-100)});
//	$('.slides_carousel').slides({
//		preload: true
//	});
//	
//	$('#section1_2 .pagination').remove();
//	
//	$('.app_item a').nm({
//		callbacks: {
//			afterShowCont: function (nm) {
//				$('.avator a').tipsy({gravity: 's'});
//			}
//		}
//	});
//	
	//vote
	$('#photowall_container .flag-action').bind('click',function(){
		var appitem = $(this).parents('.box');
		$(this).unbind('click').css('cursor','default');
		var like_count =  appitem.find('.like_count');
		var count = like_count.html();
		count = parseInt(count) + 1;
		like_count.html(count);
		appitem.append("<div id='vote_text' class='love'></div>");
		var text = appitem.find('#vote_text');
		text.clearQueue().css({'opacity':0,'display':'block'}).animate({opacity:0.8,'top':0},function(){
			text.delay(2000).animate({opacity:0,'top':800},2000,function(){
				$(this).remove();
			});
		});
	});
	
	var height = $(window).height()-80;
	var height2 = $(window).height()-140;
	var width = $(window).width();
	var section_container = $('.section_container').height();
	
	$('#photowall_home,#section_2,#section_3,#section_4,#section_5,#section_5_1,#section_5_2').height(height);
	if($('body').hasClass('touch')){
		$('.photowall_left,.photowall_left_wrap,#photowall_left_arrow').height(section_container);
	}
	else
	{
		$('.photowall_left,.photowall_left_wrap,#photowall_left_arrow').height(height2);
	}
	
	$('.photowall_left_wrap').jScrollPane({autoReinitialise:true});
	$('.friends_intro_long').jScrollPane({autoReinitialise:true});
	$('.product_detail_right .desc').jScrollPane({autoReinitialise:true});
	
	$('.section_box').css('width',width);
	$('.section_container').stop().animate({'margin-left':-currentIndex*width});
	if($('#photowall_home').length > 0)
	{
		if($('#photowall_home').offset().top<0)
			$('#photowall_home').css({'margin-top':-height});
		var hometop = ($(window).height() - $('#photowall_home .section_wrap').height())/2-80;
		if(hometop<0) hometop = 0;
		$('#photowall_home .section_wrap').stop().animate({'margin-top':hometop});
		if(height > 640)
		{
			$('#link2appwall').animate({'margin-top':50});
		}
		else
		{
			$('#link2appwall').animate({'margin-top':0});
		}
	}
	
	var friendtop = ($(window).height() - $('.friends_box').height())/2-80;
	if(friendtop<0) friendtop=0;
	$('.friends_box').stop().animate({'margin-top':friendtop});
		
	var runtop = ($(window).height() - $('.coming-soon-run').height())/2-80;
	$('.coming-soon-run').css('margin-top',runtop);
	runing();
	
	var userpanetop = ($(window).height() - $('#bm_services_userpane_wrap').height() - 60)/2;
	if(userpanetop<0) userpanetop=0;
	var userpaneleft = ($(window).width() - $('#bm_services_userpane_wrap').width() - 20)/2;
	if(userpaneleft<0) userpaneleft=0;
	$('#bm_services_userpane_wrap').stop().animate({'bottom':userpanetop,'left':userpaneleft});
	
	var uploadboxtop = ($(window).height() - $('#bm_services_uploadbox_wrap').height() - 20)/2;
	if(uploadboxtop<0) uploadboxtop=0;
	var uploadboxleft = ($(window).width() - $('#bm_services_uploadbox_wrap').width() - 20)/2;
	if(uploadboxleft<0) uploadboxleft=0;
	$('#bm_services_uploadbox_wrap').stop().animate({'bottom':uploadboxtop,'left':uploadboxleft});
	

	var loginboxtop = ($(window).height() - $('#bm_services_login_form_wrap').height() - 60)/2;
	if(loginboxtop<0) loginboxtop=0;
	var loginboxleft = ($(window).width() - $('#bm_services_login_form_wrap').width())/2-100;
	if(loginboxleft<0) loginboxleft=0;
	$('#bm_services_login_form_wrap').stop().animate({'bottom':loginboxtop,'left':loginboxleft});
	
	
	var readtop = ($(window).height() - $('#section_2 .section_wrap').height())/2 - 80;
	if(readtop<0) readtop = 0;
	$('#section_2 .section_wrap').stop().animate({'margin-top':readtop});
	
	var clubtop = ($(window).height() - $('#section_5_1 .section_wrap').height())/2 - 80;
	if(clubtop<0) clubtop = 0;
	
	if($(window).width() < 1000)
	{
		$('.product_prev,.product_next').hide();
	}
	else
	{
		$('.product_prev,.product_next').show();
	}
	$('#section_5_1 .section_wrap').stop().animate({'margin-top':clubtop});
	if($('#section_5_1').length>0)
	{
		if($('#section_5_1').offset().top<0)
			$('#section_5_1').css({'margin-top':-height});
	}

	//resize home banners
	if($(window).width() < 1400)
	{
		$('#photowall_toppick .box img,#photowall_toppick .box,#photowall_toppick .box .img').width(116).height(116);
		$('#photowall_toppick').width(385).height(116);
		$('#photowall_row1').width(816).height(146);
		$('.cate_box img').width(170).height(170);
		$('.cate_cover_item').width(170);
		$('.cate_cover').width(816).height(277);
		$('#photowall_banner').css('margin-left',15);
		$('#photowall_banner img').width(385).height(116);
		$('.toppick_comment').css({'left':141,'top':48,'font-size':16,'width':200});
		$('#toppick_bg').css({'width':270,'height':116});
	}
	else if($(window).width() > 2200)
	{
		$('#photowall_toppick .box img,#photowall_toppick .box,#photowall_toppick .box .img').width(235).height(235);
		$('#photowall_toppick').width(780).height(235);
		$('#photowall_row1').width(1640).height(273);
		$('.cate_box img').width(370).height(370);
		$('.cate_cover_item').width(370);
		$('.cate_cover').width(1640).height(477);
		$('#photowall_banner').css('margin-left',23);
		$('#photowall_banner img').width(780).height(235);
		$('.toppick_comment').css({'left':300,'top':96,'font-size':26,'width':400});
		$('#toppick_bg').css({'width':547,'height':235});
	}
	else
	{
		$('#photowall_toppick .box img,#photowall_toppick .box,#photowall_toppick .box .img').width(174).height(174);
		$('#photowall_toppick').width(576).height(174);
		$('#photowall_row1').width(1223).height(220);
		$('.cate_box img').width(270).height(270);
		$('.cate_cover_item').width(270);
		$('.cate_cover').width(1223).height(377);
		$('#photowall_banner').css('margin-left',31);
		$('#photowall_banner img').width(576).height(174);
		$('.toppick_comment').css({'left':220,'top':72,'font-size':22,'width':320});
		$('#toppick_bg').css({'width':407,'height':175});
	}
}

function runing(){
	var width = $(window).width();
	$('.coming-soon-run').css({'margin-left':-400}).stop().animate({'margin-left':width},
			11000, 'linear' ,function(){
		runing();
	});
}

function activeTopNav(id){
	$('#topNav>li>a').removeClass('active');
	$('#topNav>li>a').eq(id).addClass('active');
}

function loadImg(){
	var imgs = new Array('images/logo-bear1.gif','images/logo-bear2.gif','images/logo-bear3.gif','images/logo-bear4.gif','images/logo-bear5.gif','images/icon_cool1.png','images/icon_love1.png','images/icon_creative1.png');
	for(var i = 0;i<imgs.length;i++){
		img = new Image();
		img.src = imgs[i];
	}
}

function homeMoving(des){
	var ele1 = $('#section1_1 .slider_wrap');
	//var ele2 = $('#link2appwall');
	if(des > 350)
		ele1.clearQueue().css({'margin-top': 128 + (des*1-350)},300);
	else
		ele1.css({'margin-top': 128});
}

function screen2Moving(des){
	var bg1 = $('#section2');
	var ele1 = $('#section2_1 .slider_wrap');
	bg1.stop().animate({'background-position': -des+'% '+(-des*0.5) + 'px'});

	if(des > 864)
		ele1.stop().animate({'margin-top': 182 + (des*1-864)},300);
	else{
		ele1.stop().animate({'margin-top': 182});
	}
}

// after upload
function readURL(input) {
	$('#bm_services_upload_picture').removeAttr('disabled');
    $('#bm_services_upload_picture').click();
	$('#bm_services_uploadbox_wrap .file').addClass('selected');
}
function readURL_avator(input) {
	$('#bm_services_upload_avator').removeAttr('disabled');
    $('#bm_services_upload_avator').click();
	$('#bm_services_userpicture_form .file').addClass('selected');
}


// moving functions
function move2home(){
	$('.photowall_left').fadeOut();
	$('.section_container').animate({'margin-left':0});
	$('#photowall_home').animate({'margin-top':0});
	$.scrollTo( 0, 400 );
	$('body').css('overflow','hidden');
	$('nav li a').removeClass('actived');
	$('.logo div').fadeOut();
	$('.logo div').eq(0).fadeIn();
	$('.logo_bg div').fadeOut();
	$('.logo_bg div').eq(0).fadeIn();
	//move2photowall();
}

function move2photowall(){
	$('.section_container').animate({'margin-left':0});
	var height = $(window).height()-80;
	$('#photowall_container').css({'opacity':0,'display':'block'});
	$('#photowall_home').animate({'margin-top':-height},function(){
		$('.photowall_left').fadeIn();
$("a[rel^='popup']").prettyPhoto({'default_width':400,'default_height':430,iframe_markup: '<iframe src ="{path}" width="{width}" height="{height}" frameborder="no" scrolling="no"></iframe>',social_tools:''});			if(userid == 0)
		{
			$('#photowall_container .like_btn').attr('title','Login to vote the photo');
			$('#photowall_container .like_btn').tipsy({live: true, gravity: 's'});
		}
		$("#photowall_container .like_btn").click(function(){
			if(userid != 0)
			{
				if($(this).html() == '')
				{
					$('#messsage_box').html('You already voted this photo.');
					$('#messsage_box').fadeIn();
					$('#messsage_box').delay(1000).fadeOut();
				}
			}
			else{
				$('.login_btn').eq(0).click();
			}
		});
		var $container = $('#photowall_container');
		$container.delay(100).animate({'opacity':1});
		
		$container.infinitescroll('destroy');
		$container.infinitescroll({                      
		  state: {                                              
			isDestroyed: false,
			isDone: false                           
		  }
		});
		$container.infinitescroll({
		  itemSelector : '.box',
		  navSelector  : '#page-nav',    // selector for the paged navigation 
		  nextSelector : '#page-nav a:first',  // selector for the NEXT link (to page 2)
		  itemSelector : '.box',     // selector for all items you'll retrieve
		  //debug: true,
		  loading: {
			  msgText: 'Loading',
			  img: 'http://www.superboomi.com/images/space.gif'
			},
			state: {
			  currPage: 0 // The number of the first comment page loaded, you can generate this number dynamically to save changing it manually
			},        
		
			pathParse: function(path,nextPage){
				path = ['photos?page=',''];
				return path;
			}
		  },
		  // trigger Masonry as a callback
		  function( newElements ) {
			// hide new items while they are loading
			// ensure that images load before adding to masonry layout

            $newElems = $(newElements).find('.box').hide();
			$newElems.imagesLoaded(function(){
			  // show elems now they're ready
                $('#photowall_container .box').delay(1000).fadeIn();
				$("a[rel^='popup']").prettyPhoto({'default_width':400,'default_height':430,iframe_markup: '<iframe src ="{path}" width="{width}" height="{height}" frameborder="no" scrolling="no"></iframe>',social_tools:''});	
				if(userid == 0)
				{
					$('#photowall_container .like_btn').attr('title','Login to vote the photo');
					$('#photowall_container .like_btn').tipsy({live: true, gravity: 's'});
				}
				$newElems.find('.flag-action').bind('click',function(){
					var appitem = $(this).parents('.box');
					$(this).unbind('click').css('cursor','default');
					var like_count =  appitem.find('.like_count');
					var count = like_count.html();
					count = parseInt(count) + 1;
					like_count.html(count);
					appitem.append("<div id='vote_text' class='love'></div>");
					var text = appitem.find('#vote_text');
					text.clearQueue().css({'opacity':0,'display':'block'}).animate({opacity:0.8,'top':0},function(){
						text.delay(2000).animate({opacity:0,'top':800},2000,function(){
							$(this).remove();
						});
					});
				});
				
				$newElems.find('.flag-link-toggle').each(function(){
					url = 	 $(this).attr('href');
					$(this).attr('title',url);
					$(this).attr('href','###');
				});
				
				$newElems.find('.flag-link-toggle').live('click',function(){
					var url = $(this).attr('href');
					$(this).attr('href','###');
					$.ajax({
					  url: url,
					  type: "POST",
					  data: {js : true},
					  dataType: "json"
					});
					return false;
				});
				$newElems.animate({ opacity: 1 });
			});
		  }
		);
		$container.infinitescroll('bind');
	});
	$('body').attr({'style':''});
	$('nav li a').removeClass('actived');
	$('nav li a').eq(0).addClass('actived');
	$('.logo div').fadeOut();
	$('.logo div').eq(1).fadeIn();
	$('.logo_bg div').fadeOut();
	$('.logo_bg div').eq(1).fadeIn();
	currentIndex = 0;
	
	$('#reg_in_login').click(function(){
		$('#bm_services_login_form_wrap ul li').eq(1).click();
	});
	
}


function move2readwath(){
	var width = $(window).width();
	$('.section_container').animate({'margin-left':-width});
	$.scrollTo( 0, 400 );
	$('body').css('overflow','hidden');
	$('nav li a').removeClass('actived');
	$('nav li a').eq(1).addClass('actived');
	$('.logo div').fadeOut();
	$('.logo div').eq(2).fadeIn();
	$('.logo_bg div').fadeOut();
	$('.logo_bg div').eq(2).fadeIn();
	currentIndex = 1;
    $('.photowall_left').fadeOut();
	var $container = $('#photowall_container');
	$container.infinitescroll('destroy');
	$container.infinitescroll({                      
	  state: {                                              
		isDestroyed: false,
		isDone: false                           
	  }
	});
}

function move2playmake(){
	var width = $(window).width();
	$('.section_container').animate({'margin-left':-width*2});
	$.scrollTo( 0, 400 );
    $('#section_printing').animate({'margin-top':0});
	$('body').css('overflow','hidden');
	$('nav li a').removeClass('actived');
	$('nav li a').eq(2).addClass('actived');
	$('.logo div').fadeOut();
	$('.logo div').eq(3).fadeIn();
	$('.logo_bg div').fadeOut();
	$('.logo_bg div').eq(3).fadeIn();
	currentIndex = 2;
    $('.photowall_left').fadeOut();
	var $container = $('#photowall_container');
	$container.infinitescroll('destroy');
	$container.infinitescroll({                      
	  state: {                                              
		isDestroyed: false,
		isDone: false                           
	  }
	});
}

function move2storyidea(){
    var width = $(window).width();
    var height = $('#section_printing').height();
    $('.section_container').animate({'margin-left':-width*2});
    $.scrollTo( 0, 400 );
    $('#section_printing').animate({'margin-top':-height});
    $('body').css('overflow','hidden');
    $('nav li a').removeClass('actived');
    $('nav li a').eq(2).addClass('actived');
    $('.logo div').fadeOut();
    $('.logo div').eq(3).fadeIn();
    $('.logo_bg div').fadeOut();
    $('.logo_bg div').eq(3).fadeIn();
    currentIndex = 2;
    $('.photowall_left').fadeOut();
    var $container = $('#photowall_container');
    $container.infinitescroll('destroy');
    $container.infinitescroll({
        state: {
            isDestroyed: false,
            isDone: false
        }
    });
}

function move2friends(){
	var width = $(window).width();
	$('.section_container').animate({'margin-left':-width*3},function(){
		getWindowSize();
	});
	$.scrollTo( 0, 400 );
	$('body').css('overflow','hidden');
	$('nav li a').removeClass('actived');
	$('nav li a').eq(3).addClass('actived');
	$('.logo div').fadeOut();
	$('.logo div').eq(4).fadeIn();
	$('.logo_bg div').fadeOut();
	$('.logo_bg div').eq(4).fadeIn();
	currentIndex = 3;
    $('.photowall_left').fadeOut();
	var $container = $('#photowall_container');
	$container.infinitescroll('destroy');
	$container.infinitescroll({                      
	  state: {                                              
		isDestroyed: false,
		isDone: false                           
	  }
	});
}

function move2club(){
	var width = $(window).width();
	$('.section_container').animate({'margin-left':-width*4});
	$.scrollTo( 0, 400 );
	$('body').css('overflow','hidden');
	$('nav li a').removeClass('actived');
	$('nav li a').eq(4).addClass('actived');
	$('.logo div').fadeOut();
	$('.logo div').eq(5).fadeIn();
	$('.logo_bg div').fadeOut();
	$('.logo_bg div').eq(5).fadeIn();
	currentIndex = 4;
    $('.photowall_left').fadeOut();
	var $container = $('#photowall_container');
	$container.infinitescroll('destroy');
	$container.infinitescroll({                      
	  state: {                                              
		isDestroyed: false,
		isDone: false                           
	  }
	});
}

function openUpoadbox(){
	$('.upload_btn').eq(0).click();
}

function openLoginboxinPopup(){
	$('.pp_close').click();
	$('.login_btn').eq(0).click();
}

function autoHomeSlider(){
	var thisPage = $('#photowall_home .pager a.active');
	if(thisPage.next().length>0)
		thisPage.next().click();
	else
		$('#photowall_home .pager a').eq(0).click();
}

function loadCount(){
	for(var i=1;i<5;i++)
	{
		$.ajax({
			url: 'superboomi_service/node/simple_term_count',
			data: {
				'tid': i
			},
			dataType: 'json',
			type: "POST",
			success: function (data) {
				var count = data[1];
				if(count > 0)
				{
					$('.photowall_category_icons li').eq(data[0]).append('<span class="new">new</span>');
				}
			}
		});
		
	}
}