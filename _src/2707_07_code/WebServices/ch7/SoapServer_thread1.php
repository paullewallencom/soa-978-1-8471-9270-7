<?php
//File: SoapServer_thread1.php
require_once "thread1.php"; 
$wsdl= "http://localhost/WebServices/wsdl/thread1.wsdl";
$srv= new SoapServer($wsdl);
$srv->setClass("thread1");
$srv->handle();
?>