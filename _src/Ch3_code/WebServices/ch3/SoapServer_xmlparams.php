<?php
//File: SoapServer_xmlparams.php
require_once "orderInfo.php"; 
$wsdl= "http://localhost/WebServices/wsdl/po_xmlparams.wsdl";
$srv= new SoapServer($wsdl);
$srv->setClass("orderInfo");
$srv->handle();
?>