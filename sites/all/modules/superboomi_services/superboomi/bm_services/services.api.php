base url: 
http://tianzifang.cn/yangchenglank.server/yangchenglank/html/superboomi_service

1. Register With Email

short url:
	user/simple_register
params: 
	array('mail' => 'jziwenchen@gmail.com')

request header: "Content-Type:application/json"

response:
	type: JSON
	sample: {uid => 2, uri: http://xxx.com/user/2}

2. Post Picture
short url:
    node/simple_create
params:
	array('title' => 'name of picture', 'field_boomi_image' => @"path/to/file/in/your/local", 'uid' => 2)

request header: "Content-Type:application/x-www-form-urlencoded"
reponse:
	type: JSON
	sample: {nid: 1, uri: http://xxx.com/node/1}

3. Picture List
short url: 
	node/simple_retrieve
params:
	array('uid' => 2, 'num' => 10, 'offset' => 0)
request header: "Content-Type:application/json"
response:
	type: JSON
	sample: [{'nid' => 1, 'title' => 'name of picture', 'field_boomi_image' => 'http://urltoimage.com'}]

注意: 图片没有用二进制直接返回给你，是已URL形式，所以你自己还需要再抓一次数据





