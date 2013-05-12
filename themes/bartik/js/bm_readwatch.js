/* Functions Definition */
var apiPath = "superboomi_service/";
$.Watch  = function()
{
    function openWatch(nid,cb){
        $.getJSON(apiPath + "watch" + "?nid=" + nid, cb);
    }

    return {
        openWatch: openWatch
    }
}

/* Event */
var tmp_watch = _.template('<div class="watch_item"><a class="back" href="###">Back to list</a><iframe width="100%"  scrolling="no" frameborder="0" src="<%= video %>"></iframe><div class="title"><%= title %></div><div data-flagged="<%= flagged %>" data-nid="<%= nid %>" class="like"><%= likeCounter %></div><div class="desc"><%= desc %></div></div>');
$('#watchflip1 a').unbind('click');
$('#watchflip1 a').click(function(e){
    e.preventDefault();
    var nid = $(this).attr('data-nid');
    $.Watch().openWatch(nid,function(res){
        res = res[0];
        if(_.isUndefined(res.flag_counts_node_count))
        {
            res.flag_counts_node_count = 0;
        }
        $('#watch_item_wrap').css({width:-$(window).width()});
        $('#watch_item_wrap').append(tmp_watch({
            video:res['Video URL'],
            desc: res.Body,
            title:res.node_title,
            likeCounter:res.flag_counts_node_count,
            nid:res.nid,
            flagged:res.views_php_4
        }));
        $('#watch_item_wrap').delay(500).animate({'left':0},400);
        var watchItemWidth = $('#watch_item_wrap .watch_item').width();
        $('#watch_item_wrap').find('iframe').height(watchItemWidth*0.6);
        bindWatchEvents();
    });
});

$('#watchflip2 a').unbind('click');
$('#watchflip2 a').click(function(e){
    console.log(2);
    e.preventDefault();
    var nid = $(this).attr('data-nid');
    $('#watch_item_wrap').css({width:-$(window).width()});
    $('#watch_item_wrap').append('<iframe width="100%" src="node/'+ nid + '"/>');
    var height = $(window).height();
    $('#watch_item_wrap').find('iframe').height(height);
    $('#watch_item_wrap').delay(500).animate({'left':0},400);
});

var closeWatchItem = function(){
    $('#watch_item_wrap').animate({'left':-$(window).width()},400,function(){
        $(this).empty();
    });
}

var bindWatchEvents = function(){
    $('.watch_item .back').click(function(){
        $('#watch_item_wrap').animate({'left':-$(window).width()},400,function(){
           $(this).empty();
        });
    });
    $('#watch_item_wrap').find('.like').click(function(){
        _likeIt($(this));
    });
    var _likeIt = function(_this){
        var nid = _this.attr('data-nid');
        var count = parseInt(_this.html());
        var _this = _this;
        $.Like().like(nid, _global_uid ,function(res){ //TODO
            count++;
            $('.like[data-nid="'+_this.attr('data-nid')+'"]').html(count).addClass('flagged_true flagged').unbind('click');
        },function(res){
            console.log(res);
        });
    }
}

var bindWatchInit = function(){
    // Initialize Isotope
    $('#watchflip1,#watchflip2').isotope({
        resizable: false,
        masonry: {
            columnWidth: 370
        }
    });

    $('#btn_videos').click(function(){
        $('#watchflip2').fadeOut(400);
        $('#watchflip1').delay(400).fadeIn(400,function(){
            $('#watchflip1').isotope('reLayout');
        });
        $('.readwatch_btn a').removeClass('active');
        $(this).addClass('active');
    });

    $('#btn_comics').click(function(){
        $('#watchflip1').fadeOut(400);
        $('#watchflip2').css({display:'block',opacity:0}).isotope('reLayout');
        $('#watchflip2').delay(400).animate({opacity:1});
        $('.readwatch_btn a').removeClass('active');
        $(this).addClass('active');
    });

    $(window).on("debouncedresize",function(){
        var columns = Math.floor( ( $('body').width() - 40) / 370 );
        $('#watchflip1,#watchflip2').width( columns * 370 );
        setTimeout(function(){
            $('#watchflip1,#watchflip2').isotope('reLayout');
        },300);

        var watchItemWidth = $('#watch_item_wrap .watch_item').width();
        $('#watch_item_wrap').find('iframe').height(watchItemWidth*0.6);
    });
    $(window).trigger("debouncedresize");
}

bindWatchInit();