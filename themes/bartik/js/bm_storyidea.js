/* Functions Definition */
var apiPath = "superboomi_service/";
$.Storyidea = function(){
    function create(body,cb,error){
        $.ajax({
            type: "POST",
            url: apiPath + "storyidea",
            data: JSON.stringify({body: body}),
            dataType: 'json',
            contentType: 'application/json',
            success: cb,
            error: error
        });
    }

    function index(page,cb){
        $.getJSON(apiPath + "storyidea" + "?page=" + page, cb);
    }

    function like(nid,uid,cb,error){
        $.ajax({
            type: "POST",
            url:  apiPath + "flag/flag",
            data: JSON.stringify({flag_name: 'lke_picture', content_id:nid, action:'flag', uid:uid}),
            dataType: 'json',
            contentType: 'application/json',
            success: cb,
            error: error
        });
    }

    return {
        create: create,
        index: index,
        like: like
    };
};


/* Views */

// Create idea views
$('#form_storyidea').submit(function(e){
    e.preventDefault();
    var submitBtn = $(this).find('input[type=submit]');
    var storyBody = $(this).find('.idea_body').val();
    var errorMsg = $(this).find('.errorMsg');
    var loadingMsg = $(this).find('.loadingMsg');

    if(_.isEmpty(storyBody))
    {
        errorMsg.fadeIn(200);
        return false;
    }
    errorMsg.fadeOut(200);
    loadingMsg.fadeIn(200);
    submitBtn.attr('disabled','disabled');
    $.Storyidea().create(storyBody,function(res){
        $('#storyidea_fields').fadeOut(400);
        $('#storyidea_sent').delay(400).fadeIn(400);
        submitBtn.removeAttr('disabled');
        loadingMsg.fadeOut();
    },function(res){
        submitBtn.removeAttr('disabled');
        loadingMsg.fadeOut();
    });
    return false;
});

$('#storyidea_sent a').click(function(e){
    e.preventDefault();
    $('#storyidea_sent').fadeOut(400);
    $('#storyidea_fields').delay(400).fadeIn(400);
    $('#form_storyidea').find('.idea_body').val('');
});



// Index ideas views
var tpl_ideaItem = _.template('<div class="storyidea_item color_<%= randomId %>"> <div class="body"><span class="ellipsis_text"><%= body %></span></div><div class="name"><img src="<%= avatar %>" /><%= name %></div><div data-flagged="<%= flagged %>" data-nid="<%= nid %>" class="like flagged_<%= flagged %>"><%= likeCounter %></div></div>');
$.Storyidea().index(0, function(res){

    var storyIdeaList = $('#storyidea_list');
    for(index in res)
    {
        if(_.isUndefined(res[index].flag_counts_node_count))
        {
            res[index].flag_counts_node_count = 0;
        }
        var randomId = Math.floor(Math.random()*3);
        storyIdeaList.append(tpl_ideaItem({
            randomId: randomId,
            name:res[index].users_node_name,
            body:res[index].Body,
            likeCounter:res[index].flag_counts_node_count,
            nid:res[index].nid,
            avatar:res[index].users_node_picture,
            flagged:res[index].views_php_6
        }));
    }
    bindStoryIdeaEvents();
});


/* Events */
var bindStoryIdeaEvents = function(){

    if(userid){
        $('#storyidea_list .like').unbind('click');
        $('#storyidea_list .like').each(function(){
            var flagged = $(this).attr('data-flagged');
            if(flagged === 'false')
            {
                $(this).click(function(){
                    _likeIt($(this));
                });
            }
            else
            {
                $(this).addClass('flagged');
            }
        });
    }
    else
    {
        $('#storyidea_list .like').attr('title','Login to vote.');
        $('#storyidea_list .like').tipsy({live: true, gravity: 's'});
    }
    $('.storyidea_item .body').click(function(){

        $.fancybox( {
            openMethod : 'dropIn',
            scrolling : false,
            content: $('<div class="storyidea_popup"></div>').append($(this).parent().html()),
            minWidth: 400,
            maxWidth: 600,
            helpers: {
                overlay : {
                    closeClick : true,  // if true, fancyBox will be closed when user clicks on the overlay
                    speedOut   : 200,   // duration of fadeOut animation
                    showEarly  : true,  // indicates if should be opened immediately or wait until the content is ready
                    locked     : false   // if true, the content will be locked into overlay
                },
                title : {
                    type : 'float' // 'float', 'inside', 'outside' or 'over'
                }
            },
            afterShow: function(){
                $('.storyidea_popup').find('.like').click(function(){
                    _likeIt($(this));
                });
            }
        } );
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

    // Initialize Isotope
    $('#storyidea_list').isotope({
        resizable: false,
        masonry: {
            columnWidth: 320
        }
    });
}

var bindStoryIdeaInit = function(){
    $('#form_storyidea .idea_body').focus(function(){
        $(this).addClass('opened');
        $('#form_storyidea .errorMsg').fadeOut();
    });
    $('#form_storyidea .idea_body').blur(function(){
        $(this).removeClass('opened');
    });

    $(window).on("debouncedresize",function(){
        var columns = Math.floor( ( $('body').width() - 30) / 320 );
        $('#storyidea_list').width( columns * 320 );
        setTimeout(function(){
            $('#storyidea_list').isotope('reLayout');
        },300);
        if(window.location.href.indexOf('c_storyidea') > 0)
        {
            var section_printing_height = $('#section_printing').height();
            $('#section_printing').css({'margin-top':-section_printing_height});
        }
    });
    $(window).trigger("debouncedresize");
}


bindStoryIdeaInit();

(function ($, F) {
    F.transitions.dropIn = function() {
        var endPos = F._getPosition(true);

        endPos.top = (parseInt(endPos.top, 10) - 200) + 'px';

        F.wrap.css(endPos).show().animate({
            top: '+=200px'
        }, {
            duration: F.current.openSpeed,
            complete: F._afterZoomIn
        });
    };

    F.transitions.dropOut = function() {
        F.wrap.removeClass('fancybox-opened').animate({
            top: '-=200px'
        }, {
            duration: F.current.closeSpeed,
            complete: F._afterZoomOut
        });
    };

}(jQuery, jQuery.fancybox));