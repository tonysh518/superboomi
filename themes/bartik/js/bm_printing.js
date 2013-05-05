/* Functions Definition */
var apiPath = "superboomi_service/";

$.Printing = function(){
    function create(before,cb){
        $('#from_upload_print').ajaxForm({
            dataType: 'json',
            beforeSubmit: function() {
                before();
            },
            complete: cb
        });
    }

    function index(page,cb){
        $.getJSON(apiPath + "printing" + "?page=" + page, cb);
    }

    return {
        create: create,
        index: index
    };
};


/* Views */

// Printing views
var errorMsg = $('#from_upload_print').find('.errorMsg');
var loadingMsg = $('#from_upload_print').find('.loadingMsg');
var submitBtn = $(this).find('input[type=submit]');
var form = $('#from_upload_print');
var sentMsg = $('#printing_sent');

$.Printing().create(function(){
    var field_image = $('#from_upload_print #field_image').val();
    submitBtn.attr('disabled','disabled');
    if(_.isEmpty(field_image))
    {
        errorMsg.fadeIn();
        $('#from_upload_print').find('.errorMsg').fadeIn(400);
        submitBtn.removeAttr('disabled');
        return false;
    }
    errorMsg.fadeOut();
    loadingMsg.fadeIn(200);
},function(res){
    form.fadeOut(400);
    sentMsg.delay(400).fadeIn(400);
    submitBtn.removeAttr('disabled');
    loadingMsg.fadeOut();
});

$('#printing_sent a').click(function(e){
    e.preventDefault();
    $('#storyidea_sent').fadeOut(400);
    form.delay(400).fadeIn(400);
    form.find('#field_image').val('');
    sentMsg.fadeOut();
});

// Index printing views
var tpl_printingItem = _.template('<div class="printing_item"><div class="name"><%= name %></div><a href="<%= bigimg %>"><img src="<%= img %>" /></a><div data-flagged="<%= flagged %>" data-nid="<%= nid %>" class="like"><%= likeCounter %></div></div>');
$.Printing().index(0, function(res){
    var printingList = $('#printing_list');
    for(index in res)
    {
        if(_.isUndefined(res[index].flag_counts_node_count))
        {
            res[index].flag_counts_node_count = 0;
        }
        printingList.append(tpl_printingItem({
            name:res[index].users_node_name,
            img:res[index].Image[0],
            bigimg:res[index].Image[0].replace('styles/260x260/public/',''),
            likeCounter:res[index].flag_counts_node_count,
            nid:res[index].nid,
            flagged:res[index].views_php_5
        }));
    }
    bindPrintingEvents();
});


/* Events */
var bindPrintingEvents = function(){
    $('#printing_list .like').unbind('click');
    $('#printing_list .like').each(function(){
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
}