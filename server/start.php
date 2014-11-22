<?php

/* This program is free software. It comes without any warranty, to
 * the extent permitted by applicable law. You can redistribute it
 * and/or modify it under the terms of the Do What The Fuck You Want
 * To Public License, Version 2, as published by Sam Hocevar. See
 * http://sam.zoy.org/wtfpl/COPYING for more details. */


ini_set('display_errors', 1);
error_reporting(E_ALL);



chdir(__DIR__.'/../');


require('library/wrench/lib/SplClassLoader.php');
$classLoader = new SplClassLoader('Wrench', 'library/wrench/lib');
$classLoader->register();


require('library/GC/WebSocket/Server.php');
require('library/GC/WebSocket/Client.php');
require('library/GC/WebSocket/Message.php');
require('configuration.php');








$server = new \Wrench\Server('ws://'.$ip.':'.$port.'/', array(
    'check_origin'               => false,
));


$application=new \GC\WebSocket\Server();

$application->on('disconnect', function($application, $client) {
	echo "\n===================\nDisconnected : ".$client->getId().''."\n===================\n";
	$application->broadcast('disconnect', array('id'=>$client->getId()));
	return true;
});


$application->on('connect', function($application, $client) {
	echo "\n===================\nConnection : ".$client->getId().''."\n===================\n";
	$application->broadCastUserList();
	return true;	
});


$application->on('message', function($application, $client, $data) {
	$application->broadcast('message', array('message'=>$data['message']));
	return true;
});


$application->on('fileUploaded', function($application, $client, $data) {
	$application->sendTo($data['userId'], 'downloadFile', array('file'=>'download.php?fileId='.$data['fileId']));
	return true;
});




$application->on('update', function($application, $client) {
	//echo "\n===================\nUpdate : ".microtime(true).''."\n===================\n";
	//return true;	
});








$server->registerApplication($serviceName, $application);
$server->run();




















