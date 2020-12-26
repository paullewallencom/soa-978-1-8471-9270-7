<?php
//File: SoapServer_secure.php
require_once "purchaseOrder_wssecurity.php"; 
$wsdl= "http://localhost/WebServices/wsdl/po_wssecurity.wsdl";
$srv= new SoapServer($wsdl);
$srv->setClass("purchaseOrder");
$srv->handle();
?>