<?php
//File: SoapServer_thread2.php
require_once "thread2.php"; 
$wsdl= "http://localhost/WebServices/wsdl/thread2.wsdl";
$srv= new SoapServer($wsdl);
$srv->setClass("thread2");
$srv->handle();
?>