<?php

function json_post($url, $data, $files = array()) {
	$content_type = 'Content-Type:application/json';
	if (!empty($files) && is_array($files)) {
		$data = array_merge($data, $files);
		$content_type = 'Content-Type:multipart/form-data';
	}
	else {
		$data = json_encode($data);
	}
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array($content_type));
	$ret_data = curl_exec($ch);
	if (!curl_errno($ch)) {
		$info = curl_getinfo($ch);
	}
	else {
		echo '2';
		//error.
	}
	curl_close($ch);
	return $ret_data;
}

// Server
//$base_url = 'http://tianzifang.cn/superboomi/superboomi_service/';
// test server
//superboomi_service/user/simple_register
//$base_url = 'http://hmu064240.chinaw3.com/superboomi_service/';
//production
//$base_url = 'http://www.superboomi.com/';
// Local
$base_url = 'http://localhost/superboomi2/dev/superboomi_service/';

//====================================================================================================
// $api_register = 'user/simple_register';

// $register_data = json_post($base_url. $api_register, array(
// 	'mail' => 'jziwenchen1@gmail.com',
// ));

// print_r($register_data);

//====================================================================================================
// $api_login = 'user/login';

// $login_data = json_post($base_url. $api_login, array(
// 	'username' => 'admin', 'password' => 'admin'
// ));

// print_r($login_data);


//====================================================================================================
$api_post_picture = 'node/simple_crop';
echo $base_url. $api_post_picture;
$node_data = json_post($base_url. $api_post_picture, array(
	'nid' => 130,
	'width' => '200',
	'height' => '200',
	'x' => '60',
	'y' => '60'
));

print_r($node_data);

//====================================================================================================
// $api_retrieve = "node/simple_retrieve";

// $pictures_data = json_post($base_url. $api_retrieve, array());

// print_r($pictures_data);

//====================================================================================================
// $api_login = 'user/simple_login';

// $login_data = json_post($base_url. $api_login, array(
// 	'mail' => 'jziwenchen@gmail.com',
// ));

// print_r($login_data);

//====================================================================================================
// $api_user_create = 'user/simple_create';

// $login_data = json_post($base_url. $api_user_create, array(
// 	'mail' => 'jziwenchen14@gmail.com','name' => 'admin1111', 'pass' => 'admin'
// ));

// print_r($login_data);

//====================================================================================================
// $api_user_lostpassword = 'user/simple_lostpassword';

// $user_lostpassword_data = json_post($base_url. $api_user_lostpassword, array(
// 	'mail' => 'jziwenchen@gmail.com'
// ));

// print_r($user_lostpassword_data);

// $api_user_update = 'user/simple_update';
// $api_user_update_data = json_post($base_url.$api_user_update, array(
// 	'pass' => 'adminadmin', 'uid' => 10
// ));

// print_r($api_user_update_data);