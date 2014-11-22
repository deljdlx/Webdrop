<?php

if(isset($_GET['getServiceInfo'])) {
	include(__DIR__.'/../configuration.php');

	header('Content-type: application/json');

	echo json_encode(array(
		'ip'=>$ip,
		'port'=>$port,
		'serviceName'=>$serviceName
	));

	exit();

}

?>

<!doctype html>
<html>
<head>
<title>Webdrop</title>
<link rel="stylesheet" href="global.css"></link>

<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script src="./gc_socket/websocket/client.js"></script>
<script src="./gc_socket/websocket/message.js"></script>


<script src="webdrop/webdropclient.js"></script>
<script src="webdrop/webdropuser.js"></script>
<script src="webdrop/webdropuploader.js"></script>

</head>

<body>

<div class="main">
	<div class="scanner"></div>
</div>




<div class="userList"></div>
<h1>Webdrop, drag it, drop it, share it</h1>


<style>#forkongithub a{background:#666;color:#fff;text-decoration:none;font-family:arial,sans-serif;text-align:center;font-weight:bold;padding:5px 40px;font-size:1rem;line-height:2rem;position:relative;transition:0.5s;}#forkongithub a:hover{background:#99A;color:#fff;}#forkongithub a::before,#forkongithub a::after{content:"";width:100%;display:block;position:absolute;top:1px;left:0;height:1px;background:#fff;}#forkongithub a::after{bottom:1px;top:auto;}@media screen and (min-width:800px){#forkongithub{position:fixed;display:block;top:0;right:0;width:200px;overflow:hidden;height:200px;z-index:9999;}#forkongithub a{width:200px;position:absolute;top:60px;right:-60px;transform:rotate(45deg);-webkit-transform:rotate(45deg);-ms-transform:rotate(45deg);-moz-transform:rotate(45deg);-o-transform:rotate(45deg);box-shadow:4px 4px 10px rgba(0,0,0,0.8);}}</style><span id="forkongithub"><a href="https://github.com/ElBiniou/Webdrop">Fork me on GitHub</a></span>


<iframe id="download" style="display:none"></iframe>

</body>


<script>
var containerCircle=jQuery('.main');
var increment=80;
for(var i=1; i<30; i++) {
	containerCircle.append('<div class="circle" style="width:'+(i*increment)+'px; height:'+(i*increment)+'px; margin-top:-'+(i*increment/2)+'px;margin-left:-'+(i*increment/2)+'px;"></div>');
}
</script>




<script>







var client=new WebDropClient(new GC_Client());
client.connect('?getServiceInfo');















</script>


</html>
