<?php
//File: SoapServer_headers.php
require_once "purchaseOrder_headers.php"; 
require_once "secSoapServer.php"; 
$wsdl= "http://localhost/WebServices/wsdl/po_headers.wsdl";
$srv= new secSoapServer($wsdl);
$srv->setClass("purchaseOrder");
$srv->handle($HTTP_RAW_POST_DATA);
?>