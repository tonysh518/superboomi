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
var $_Printing = {};
$_Printing.errorMsg = $('#from_upload_print').find('.errorMsg');
$_Printing.loadingMsg = $('#from_upload_print').find('.loadingMsg');
$_Printing.submitBtn = $(this).find('input[type=submit]');
$_Printing.form = $('#from_upload_print');
$_Printing.sentMsg = $('#printing_sent');
$_Printing.bear = $('#from_upload_print .icon_boomi');
$_Printing.uploadBox = $('#from_upload_print .upload');

$.Printing().create(function(){
    var field_image = $('#from_upload_print #field_image').val();
    $_Printing.submitBtn.attr('disabled','disabled');
    if(_.isEmpty(field_image))
    {
        $_Printing.errorMsg.fadeIn();
        $('#from_upload_print').find('.errorMsg').fadeIn(400);
        $_Printing.submitBtn.removeAttr('disabled');
        return false;
    }
    $_Printing.errorMsg.fadeOut();
    $_Printing.bear.fadeOut();
    $_Printing.uploadBox.fadeOut(200);
    $_Printing.loadingMsg.delay(200).fadeIn(200);
},function(res){
    $_Printing.submitBtn.removeAttr('disabled');
    $_Printing.loadingMsg.fadeOut(200);
    $_Printing.sentMsg.delay(200).fadeIn(200);
});

$('#from_upload_print #field_image').on('change',function(){
    $('#from_upload_print .file').fadeOut(300);
    $('#from_upload_print .upload').delay(300).fadeIn(300);
});

$('#from_upload_print .upload a').on('click',function(e){
    e.preventDefault();
    $('#from_upload_print .upload').fadeOut(300);
    $('#from_upload_print .file').delay(300).fadeIn(300);
});

$('#printing_sent a').click(function(e){
    e.preventDefault();
    $('#storyidea_sent').fadeOut(200);
    $_Printing.form.find('.file').delay(200).fadeIn();
    $_Printing.bear.delay(200).fadeIn();
    $_Printing.form.find('#field_image').val('');
    $_Printing.sentMsg.fadeOut();
});

// Index printing views
var tpl_printingItem = _.template('<div class="printing_item"><a href="<%= bigimg %>"><img src="<%= img %>" /></a><div class="desc"><div class="desc_wrap"><div class="name"><%= name %></div><div data-flagged="<%= flagged %>" data-nid="<%= nid %>" class="like"><%= likeCounter %></div></div></div></div>');
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
            bigimg:res[index].Image[0].replace('styles/200x200/public/',''),
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

    $('#printing_list .printing_item').unbind('mouseenter').unbind('mouseleave');
    $('#printing_list .printing_item').bind({
        mouseenter: function(){
            $(this).find('.desc').animate({bottom:-21},700,'easeOutElastic');
        },
        mouseleave: function(){
            $(this).find('.desc').animate({bottom:-78});
        }
    });

    // Initialize Isotope
    $('#printing_list').isotope({
        resizable: false,
        masonry: {
            columnWidth: 230
        }
    });

    $('#printing_list .printing_item a').fancybox( {
        openMethod : 'dropIn',
        scrolling : false,
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
        }
    } );
}

var bindStoryIdeaInit = function(){
    $(window).on("debouncedresize",function(){
        var columns = Math.floor( ( $('body').width() - 20) / 230 );
        $('#printing_list').width( columns * 230 );
        setTimeout(function(){
            $('#printing_list').isotope('reLayout');
        },300);
    });
    $(window).trigger("debouncedresize");
}

bindStoryIdeaInit();