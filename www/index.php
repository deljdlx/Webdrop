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




<div class="userList">

</div>



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
