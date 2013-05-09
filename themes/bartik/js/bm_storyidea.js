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
        $('#form_storyidea').fadeOut(400);
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
    $('#form_storyidea').delay(400).fadeIn(400);
    $('#form_storyidea').find('.idea_body').val('');
});



// Index ideas views
var tpl_ideaItem = _.template('<div class="storyidea_item color_<%= randomId %>"> <div class="body"><%= body %></div><div class="name"><img src="<%= avatar %>" /><%= name %></div><div data-flagged="<%= flagged %>" data-nid="<%= nid %>" class="like flagged_<%= flagged %>"><%= likeCounter %></div></div>');
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
    $('#storyidea_list .like').unbind('click');
    $('#storyidea_list .like').each(function(){
       var flagged = $(this).attr('data-flagged');
       if(flagged === 'false')
       {
           $(this).click(function(){
               var nid = $(this).attr('data-nid');
               var count = parseInt($(this).html());
               var _this = $(this);
               $.Like().like(nid, _global_uid ,function(res){ //TODO
                   _this.addClass('flagged');
                   count++;
                   _this.html(count);
               },function(res){
                   console.log(res);
               });
           });
       }
       else
       {
           $(this).addClass('flagged');
       }
    });
    // Initialize Isotope
    $('#storyidea_list').isotope({
        resizable: false,
        masonry: {
            columnWidth: 310
        }
    });
}

var bindStoryIdeaInit = function(){
    $('#form_storyidea .idea_body').focus(function(){
        $(this).addClass('opened');
    });
    $('#form_storyidea .idea_body').blur(function(){
        $(this).removeClass('opened');
    });

    $(window).on("debouncedresize",function(){
        var columns = Math.floor( ( $('body').width() - 20) / 310 );
        $('#storyidea_list').width( columns * 310 );
        setTimeout(function(){
            $('#storyidea_list').isotope('reLayout');
        },300);
    });
    $(window).trigger("debouncedresize");
}


bindStoryIdeaInit();