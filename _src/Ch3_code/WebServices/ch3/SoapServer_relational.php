<?php
//File: SoapServer_relational.php
require_once "purchaseOrder_relational.php"; 
$wsdl= "http://localhost/WebServices/wsdl/po_relational.wsdl";
$srv= new SoapServer($wsdl);
$srv->setClass("purchaseOrder");
$srv->handle();
?>