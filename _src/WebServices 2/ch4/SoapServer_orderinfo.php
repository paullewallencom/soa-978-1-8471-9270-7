<?php
//File: SoapServer_orderinfo.php
require_once "orderInfo.php"; 
$wsdl= "http://localhost/WebServices/wsdl/po_orderinfo.wsdl";
$srv= new SoapServer($wsdl);
$srv->setClass("orderInfo");
$srv->handle();
?>