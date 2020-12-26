<?php
 //File: SoapServer_typed.php
 require_once "purchaseOrder_typed.php"; 
 $wsdl= "http://localhost/WebServices/wsdl/po_imp.wsdl";
 $srv= new SoapServer($wsdl);
 $srv->setClass("purchaseOrder");
 $srv->handle();
?>
