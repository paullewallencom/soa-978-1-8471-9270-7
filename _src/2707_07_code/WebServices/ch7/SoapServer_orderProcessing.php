<?php
//File: SoapServer_orderProcessing.php
require_once "orderProcessing.php"; 
$wsdl= "http://localhost/WebServices/wsdl/orderProcessing.wsdl";
$srv= new SoapServer($wsdl);
$srv->setClass("orderProcessing");
$srv->handle();
?>