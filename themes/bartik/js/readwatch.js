$(document).ready(function(){  
	if($('#watchflip').length>0)
	{
		$('#section_2 .pager a').eq(0).addClass('active');
		var flipCurrent = 0;
		var flipItem = $('#watchflip li');
		$('#watchflip').css({left:-flipItem.eq(flipCurrent)[0].offsetLeft});
		flipItem.css({'opacity':0.5});
		flipItem.eq(flipCurrent).css({'opacity':1});
		flipItem.eq(flipCurrent).find('a').show();
		flipItem.click(function(){
			var index = $.inArray(this, flipItem);
			$('#watchflip').animate({left:-flipItem.eq(index)[0].offsetLeft});
			$('#section_2 .pager a').removeClass('active');
			$('#section_2 .pager a').eq(index).addClass('active');
			flipItem.css({'opacity':0.5});
			flipItem.eq(index).css({'opacity':1});
			flipCurrent = index;
			$('#watchflip li>a').hide();
			$(this).find('a').show();
			var desHeight = $(this).find('span').height()+10;
			//$('#watchflip .desc').stop().animate({'height':24});
			//$(this).find('.desc').stop().animate({'height':desHeight});
		});
		flipItem.hover(function(){
			$(this).animate({'opacity':1});
			var desHeight = $(this).find('span').height()+10;
			$(this).find('.desc').stop().animate({'height':desHeight});
		},function(){
			var index = $.inArray(this, flipItem);
			if(index != flipCurrent)
			{
				$(this).animate({'opacity':0.5});
			}
			$(this).find('.desc').stop().animate({'height':24});
		});
		$('body').keyup(function(event) {
			if($('.nav2 a').hasClass('actived'))
			{
				var thisPage = $('#section_2 .pager a.active');
				if(event.which == 39)
				{
					if(thisPage.next().length>0)
						thisPage.next().click();
					else
						$('#section_2 .pager a').eq(0).click();
				}
				if(event.which == 37)
				{
					
					if(thisPage.prev().length>0)
						thisPage.prev().click();
					else
						$('#section_2 .pager a').last().click();
				}
			}
		});
		
		$('#section_2 .pager a').click(function(){
			var index = $.inArray(this,$('#section_2 .pager a'));
			$('#watchflip li').eq(index).trigger('click');
		});	
		// add link to first link
		var firstlink = $('#watchflip li').eq(0).find('h2');
		var firstlinkhtml = firstlink.html();
		//console.log(firstlinkhtml);
		firstlink.eq(0).html("<a target='_blank' href='https://itunes.apple.com/us/app/boomis-photo-fun!-cute-photo/id541484734?ls=1&mt=8'>"+firstlinkhtml+"</a>");
//		$('#watchflip li>a, #photowall_home .video').fancybox({
//			type : 'iframe',
//			'openEffect'	: 'elastic',
//			'closeEffect'	: 'elastic',
//			'openSpeed'      : 300,
//			'closeSpeed'     : 300,
//			scrolling : 'auto',
//			autosize		: true,
//			preload   : true,
//			helpers : {
//				overlay : {
//					css : {
//						'background' : 'rgba(238,238,238,0.85)'
//					},
//					showEarly  : true,
//					locked: false
//				}
//			}
//		});
		
		
	}
});