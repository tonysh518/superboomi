<form id="upload_print" name="upload_print" method="post" enctype="multipart/form-data" action="<?php print $base_path; ?>printing/printing">
  <label for="fileField"></label>
  <input type="file" name="field_image" id="field_image" />
  <input name="" type="submit" />
</form>

<script>
var storyideaApiPath = "storyidea/storyidea";
$.Storyidea = function(){
    function create(body,cb,error){
        $.ajax({
            type: "POST",
            url: storyideaApiPath,
            data: JSON.stringify({body: body}),
            dataType: 'json',
            contentType: 'application/json',
            success: cb,
            error: error
          });
    }
    function index(page,cb){
        $.getJSON(storyideaApiPath + "?page=" + page, cb);
    }
    return {
        create: create,
        index: index
    };
};


var printingApiPath = "printing/printing";
$.Printing = function(){
    function create(cb){
       $('#upload_print').ajaxForm({
            dataType: 'json',
            uploadProgress: function(event, position, total, percentComplete) {
                
            },
            complete: cb
        });
    }
    return {
        create: create
    };
};

//$.Storyidea().create('this is a test',function(res){
//    console.log(res);
//},function(res){
//    console.log(res);
//});

//$.Storyidea().index(0, function(res){
//    console.log(res);
//});
//
//$.Storyidea().index(1, function(res){
//    console.log(res);
//});

$.Printing().create(function(res){
    console.log(res);
});
</script>
