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
var tmp_watch = _.template('<div class="watch_item"><a class="back" href="###">Back to list</a><iframe width="600" height="400" scrolling="no" frameborder="0" src="<%= video %>"></iframe><div class="title"><%= title %></div><div data-flagged="<%= flagged %>" data-nid="<%= nid %>" class="like"><%= likeCounter %></div><div class="desc"><%= desc %></div></div>');
$('#watchflip a').unbind('click');
$('#watchflip a').click(function(e){
    e.preventDefault();
    var nid = $(this).attr('data-nid');
    $.Watch().openWatch(nid,function(res){
        res = res[0];
        if(_.isUndefined(res.flag_counts_node_count))
        {
            res.flag_counts_node_count = 0;
        }
        $('#watch_item_wrap').append(tmp_watch({
            video:res['Video URL'],
            desc: res.Body,
            title:res.node_title,
            likeCounter:res.flag_counts_node_count,
            nid:res.nid,
            flagged:res.views_php_4
        }));
        $('#watch_item_wrap').animate({'left':0},400);
        bindWatchEvents();
    });
});

var bindWatchEvents = function(){
    $('.watch_item .back').click(function(){
        $('#watch_item_wrap').animate({'left':'-100%'},400,function(){
           $(this).empty();
        });
    });
}