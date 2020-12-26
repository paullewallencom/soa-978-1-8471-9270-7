<?php
 //File: SoapServer_attr.php
 require_once "purchaseOrder_attr.php"; 
 $wsdl= "http://localhost/WebServices/wsdl/po_attr.wsdl";
 $srv= new SoapServer($wsdl);
 $srv->setClass("purchaseOrder");
 $srv->handle();
?>
