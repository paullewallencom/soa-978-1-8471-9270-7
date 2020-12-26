<?php
//File: SoapServer_orderdoc.php
require_once "orderDoc.php"; 
$wsdl= "http://localhost/WebServices/wsdl/po_orderdoc.wsdl";
$srv= new SoapServer($wsdl);
$srv->setClass("orderDoc");
$srv->handle();
?>