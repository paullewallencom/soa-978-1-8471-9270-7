<?php
 //File: SoapServer_attr_price.php
 require_once "purchaseOrder_attr_price.php"; 
 $wsdl= "http://localhost/WebServices/wsdl/po_attr_price.wsdl";
 $srv= new SoapServer($wsdl);
 $srv->setClass("purchaseOrder");
 $srv->handle();
?>
