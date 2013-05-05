<?php print render($page['content']); ?>
<div id="messsage_box" style="top:120px;left:80px;"></div>
<script>
	var userid = <?php print $user->uid; ?>;
	if(userid == 0)
	{
		$('.like_btn').attr('title','Login to vote the photo');
		$('.like_btn').tipsy({live: true, gravity: 'se'});
		$('.like_btn').click(function(){
			parent.openLoginboxinPopup();
		});
	}
	$(".app_item_popup .like_btn").click(function(){
		if(userid != 0)
		{
			if($(this).html() == '')
			{
				if($('#vote_text').length == 0)
				{
					var appitem = $(this).parents('.box');
					appitem.append("<div id='vote_text' class='voted'></div>");
					var text = appitem.find('#vote_text');
					text.clearQueue().css({'opacity':0,'display':'block'}).animate({opacity:0.8,'top':0},function(){
						text.delay(2000).animate({opacity:0,'top':800},2000,function(){
							$(this).remove();
						});
					});
				}
			}
		}
		else{
			$('.login_btn').eq(0).click();
		}
	});

	$('.app_item_popup .flag-action').bind('click',function(){
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
		appitem.find('.like_btn').empty();
		appitem.find('.like_btn').click(function(){
			appitem.append("<div id='vote_text' class='voted'></div>");
			var text = appitem.find('#vote_text');
			text.clearQueue().css({'opacity':0,'display':'block'}).animate({opacity:0.8,'top':0},function(){
				text.delay(2000).animate({opacity:0,'top':800},2000,function(){
					$(this).remove();
				});
			});
		});
	});

</script>