<?php
//File: SoapServer_params.php
require_once "orderInfo.php"; 
$wsdl= "http://localhost/WebServices/wsdl/po_params.wsdl";
$srv= new SoapServer($wsdl);
$srv->setClass("orderInfo");
$srv->handle();
?>