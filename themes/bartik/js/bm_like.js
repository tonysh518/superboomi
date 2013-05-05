/* Functions Definition */
var apiPath = "superboomi_service/";
$.Like = function(){
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
        like: like
    };
};