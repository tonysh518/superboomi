$(document).ready(function(){  
	
	$('#section_5 .pager a').eq(0).addClass('active');
	var flipCurrent = 0;
	var flipItem = $('#clubflip li');
	$('#clubflip').css({left:-flipItem.eq(flipCurrent)[0].offsetLeft});
	flipItem.css({'opacity':0.5});
	flipItem.eq(flipCurrent).css({'opacity':1});
	flipItem.eq(flipCurrent).find('a').show();
	flipItem.click(function(){
		var index = $.inArray(this, flipItem);
		$('#clubflip').animate({left:-flipItem.eq(index)[0].offsetLeft});
		$('#section_5 .pager a').removeClass('active');
		$('#section_5 .pager a').eq(index).addClass('active');
		flipItem.css({'opacity':0.5});
		flipItem.eq(index).css({'opacity':1});
		flipCurrent = index;
		$('#clubflip li>a').hide();
		$(this).find('a').show();
		var desHeight = $(this).find('span').height()+10;
		//$('#watchflip .desc').stop().animate({'height':24});
		//$(this).find('.desc').stop().animate({'height':desHeight});
	});
	flipItem.hover(function(){
		$(this).animate({'opacity':1});
	},function(){
		var index = $.inArray(this, flipItem);
		if(index != flipCurrent)
		{
			$(this).animate({'opacity':0.5});
		}
	});
	$('body').keyup(function(event) {
		if($('.nav5 a').hasClass('actived'))
		{
			var thisPage = $('#section_5 .pager a.active');
			if(event.which == 39)
			{
				if(thisPage.next().length>0)
					thisPage.next().click();
				else
					$('#section_5 .pager a').eq(0).click();
			}
			if(event.which == 37)
			{
				
				if(thisPage.prev().length>0)
					thisPage.prev().click();
				else
					$('#section_5 .pager a').last().click();
			}
		}
	});
	
	$('#section_5 .pager a').click(function(){
		var index = $.inArray(this,$('#section_5 .pager a'));
		$('#clubflip li').eq(index).trigger('click');
	});	
	
	var currentProductIndex = 0;
	var productCount = $('.club_product_detail').length;
	$('.cloud-zoom').CloudZoom({'zoomWidth':300,'zoomHeight':300,'tint':false,'adjustX':20});
	$('.product_img').each(function(){
		$(this).find('.big_img').eq(0).show();
	});
	$('.product_thumbnail').each(function(){
		$(this).find('div').eq(0).addClass('active');
	});
	$('.product_thumbnail div').click(function(){
		var thumbnail_list = $(this).parent().find('div');
		thumbnail_list.removeClass('active');
		$(this).addClass('active');
		var index = $.inArray(this,thumbnail_list);
		currentProductIndex = index;
		var imgs = $(this).parent().next().find('.big_img');
		imgs.fadeOut();
		imgs.eq(index).fadeIn();
	});
	
	$('.clubtips').tipsy({gravity: 's'});
	$('.farwardproduct').click(function(){
		var index = $.inArray(this,$('.farwardproduct'));
		currentProductIndex = index;
		if(currentProductIndex == 0)
			$('.product_prev').hide();
		if(currentProductIndex == productCount-1)
			$('.product_next').hide();
		var offsetLeft = $('.club_product_detail').eq(index)[0].offsetLeft;
		$('.club_product_detail_list').css({'margin-left':-offsetLeft});
		var height = $(window).height()-80;
		$('#section_5_1').animate({'margin-top':-height});
	});
	
	$('.club_product_recommend a').click(function(){
		var index = $.inArray(this,$('.club_product_recommend a'));	
		currentProductIndex = index;
		var offsetLeft = $('.club_product_detail').eq(index)[0].offsetLeft;
		$('.club_product_detail_list').animate({'margin-left':-offsetLeft});
	});
	
	$('.product_prev').click(function(){
		if(currentProductIndex > 0)
		{
			currentProductIndex --;
			$('.product_next').show();
			if(currentProductIndex == 0)
			{
				$(this).hide();
			}
			var offsetLeft = $('.club_product_detail').eq(currentProductIndex)[0].offsetLeft;
			$('.club_product_detail_list').animate({'margin-left':-offsetLeft});
		}
	});
	$('.product_next').click(function(){
		if(currentProductIndex < (productCount - 1))
		{
			currentProductIndex ++;
			$('.product_prev').show();
			if(productCount == currentProductIndex + 1)
			{
				$(this).hide();
			}
			var offsetLeft = $('.club_product_detail').eq(currentProductIndex)[0].offsetLeft;
			$('.club_product_detail_list').animate({'margin-left':-offsetLeft});
		}
		
	});
	
	$('.product_detail_right .return,.nav5').click(function(){
		$('#section_5_1').animate({'margin-top':0});
	});
	
	var autoClubSliderTimer = setInterval(autoClubSlider,4000);
	$('#clubflip').hover(function(){
		clearInterval(autoClubSliderTimer);
	},function(){
		autoClubSliderTimer = setInterval(autoClubSlider,4000);
	});
});

function autoClubSlider(){
	var thisPage = $('#section_5_1 .pager a.active');
	if(thisPage.next().length>0)
		thisPage.next().click();
	else
		$('#section_5_1 .pager a').eq(0).click();
}