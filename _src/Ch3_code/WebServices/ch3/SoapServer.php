<?php
//File: SoapServer.php
require_once "purchaseOrder.php"; 
$wsdl= "http://localhost/WebServices/wsdl/po_mysql.wsdl";
$srv= new SoapServer($wsdl);
$srv->setClass("purchaseOrder");
$srv->handle();
?>