<?php
//File: SoapServer_secure.php
require_once "purchaseOrder_secure.php"; 
$wsdl= "http://localhost/WebServices/wsdl/po_secure.wsdl";
$srv= new SoapServer($wsdl);
$srv->setClass("purchaseOrder");
$srv->handle();
?>