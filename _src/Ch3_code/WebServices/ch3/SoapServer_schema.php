<?php
 //File: SoapServer_schema.php
 require_once "purchaseOrder_schema.php"; 
 $wsdl= "http://localhost/WebServices/wsdl/po_schema.wsdl";
 $srv= new SoapServer($wsdl);
 $srv->setClass("purchaseOrder");
 $srv->handle();
?>
