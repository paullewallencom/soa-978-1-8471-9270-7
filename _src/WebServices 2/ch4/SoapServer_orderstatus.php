<?php
//File: SoapServer_orderstatus.php
require_once "orderStatus.php"; 
$wsdl= "http://localhost/WebServices/wsdl/po_orderstatus.wsdl";
$srv= new SoapServer($wsdl);
$srv->setClass("orderStatus");
$srv->handle();
?>