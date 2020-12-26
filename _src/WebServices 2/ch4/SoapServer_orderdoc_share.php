<?php
//File: SoapServer_orderdoc_share.php
require_once "orderClass.php"; 
$wsdl= "http://localhost/WebServices/wsdl/po_orderdoc_share.wsdl";
$srv= new SoapServer($wsdl);
$srv->setClass("orderClass");
$srv->handle();
?>