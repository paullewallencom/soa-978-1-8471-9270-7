<?php
//File: SoapServer_orderstatus_share.php
require_once "orderClass.php"; 
$wsdl= "http://localhost/WebServices/wsdl/po_orderstatus_share.wsdl";
$srv= new SoapServer($wsdl);
$srv->setClass("orderClass");
$srv->handle();
?>