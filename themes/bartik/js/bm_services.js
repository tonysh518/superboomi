(function ($) {
	Drupal.behaviors.bm_services = {
		attach: function (context, settings) {
			$('#bm_services_upload_picture_form').ajaxForm({
			    beforeSend: function() {
			    	
			    },
			    uploadProgress: function(event, position, total, percentComplete) {
			    	$('#bm_services_upload_picture_form .submit').hide();
			    	$('#bm_services_upload_picture_form .uploading').show();
			    },
				complete: function(xhr) {
					$('#bm_services_upload_picture_form').animate({'margin-top':-343});
				}
			});
			
			$('#bm_services_login_form').ajaxForm({
			    beforeSend: function() {
			    	var error = 0;
			    	$('.error_msg').fadeOut();
			    	var username = $('#bm_services_login_form input[name="username"]');
			    	var password = $('#bm_services_login_form input[name="password"]');
			    	if(username.val()=='')
			    	{
			    		username.parents('.filed_text').find('.error_msg').html('Please enter username.').fadeIn();
			    		error = 1;
			    	}
			    	else
			    	{
			    		error = 0;
			    	}
			    	if(password.val()=='')
			    	{
			    		password.parents('.filed_text').find('.error_msg').html('Please enter password.').fadeIn();
			    		error = 1;
			    	}
			    	else
			    	{
			    		error = 0;
			    	}
			    	if(error == 1)
			    	{
			    		return false;
			    	}
			    	else
			    	{
			    		$('#bm_services_login_form .error_msg').fadeOut();
				    	$('.submit_loading').fadeIn();
			    	}
			    },
			    uploadProgress: function(event, position, total, percentComplete) {
			    },
				complete: function(xhr) {
					json = $.parseJSON(xhr.responseText);
					//console.log(json);
					$('.submit_loading').fadeOut();
					if(xhr.status == 401)
					{
						$('.login_error_msg').html('Wrong username or password').fadeIn();
					}
					if(json.sessid != '' && json.sessid != undefined)
					{
						location.reload();
					}
				}
			});
			
			$('#bm_services_register_form').ajaxForm({
				beforeSend: function(formData, jqForm, options) { 
					var username = $('#bm_services_register_form input[name="name"]');
					var email = $('#bm_services_register_form input[name="mail"]');
					var pass = $('#bm_services_register_form input[name="pass"]');
					var pass2 = $('#bm_services_register_form input[name="pass2"]');
					if(username.val() == '')
					{
						username.parents('.filed_text').find('.error_msg').html('Please enter username.').fadeIn();
			    		error = 1;
					}else
			    	{
						username.parents('.filed_text').find('.error_msg').fadeOut();
			    		error = 0;
			    	}
					if(email.val() == '')
					{
						email.parents('.filed_text').find('.error_msg').html('Please enter email.').fadeIn();
			    		error = 1;
					}else
			    	{
						email.parents('.filed_text').find('.error_msg').fadeOut();
			    		error = 0;
			    	}
					if(email.val() == '')
					{
						email.parents('.filed_text').find('.error_msg').html('Please enter email.').fadeIn();
			    		error = 1;
					}
					else
			    	{
						email.parents('.filed_text').find('.error_msg').fadeOut();
			    		error = 0;
			    	}
					if(pass.val() == '')
					{
						pass.parents('.filed_text').find('.error_msg').html('Please enter password.').fadeIn();
			    		error = 1;
					}else
			    	{
						pass.parents('.filed_text').find('.error_msg').fadeOut();
			    		error = 0;
			    	}
					if(pass2.val() == '')
					{
						pass2.parents('.filed_text').find('.error_msg').html('Please enter repeat password.').fadeIn();
			    		error = 1;
					}else
			    	{
						pass2.parents('.filed_text').find('.error_msg').fadeOut();
			    		error = 0;
			    	}
					if(pass2.val() != pass.val())
					{
						pass2.parents('.filed_text').find('.error_msg').html('Password not same').fadeIn();
			    		error = 1;
					}else
			    	{
						pass2.parents('.filed_text').find('.error_msg').fadeOut();
			    		error = 0;
			    	}
			    	if(error == 1)
			    	{
			    		return false;
			    	}
			    	else
			    	{
			    		$('#bm_services_register_form .error_msg').fadeIn();
				    	$('.submit .submit_loading').fadeIn();
			    	}
			    },
			    uploadProgress: function(event, position, total, percentComplete) {
			    	
			    },
				complete: function(xhr) {
					$('#bm_services_register_form .error_msg').fadeOut();
					var username = $('#bm_services_register_form input[name="name"]');
					var password = $('#bm_services_register_form input[name="pass"]');
					$.ajax({
					  url: "?q=superboomi_service/user/login",
					  type: "POST",
					  data: {username : username.val(), password: password.val()},
					  dataType: "json"
					}).done(function(msg) {
						//console.log(msg);
						if(msg.sessid != '' && msg.sessid != undefined)
						{
							location.reload();
						}
					});
				}
			});

			//
			$('#bm_services_ajax_submit_form').ajaxForm({
				beforeSend: function() {

				},
				uploadProgress: function(event, position, total, percentComplete) {

				},
				complete: function(xhr) {
					// none
				}
			});

			// unpublish / publish
			$('.views-field-unpublish a, .views-field-unpublish a').click(function () {
				var href = $(this).attr('href');
				$.ajax({
					url: href,
					success: function () {
						// success
					}
				});

				return false;
			});
		}
	};

})(jQuery);

// Drupal.ajax.prototype.commands.redirect = function (ajax, response, status) {
// 	if (response['settings'].url) {
// 		//window.location.href = response['settings'].url;
// 	}
// }