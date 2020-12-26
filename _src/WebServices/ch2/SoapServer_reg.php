<?php
 //File: SoapServer_reg.php
 $wsdl= "http://localhost/WebServices/wsdl/reg.wsdl";
 require_once "reg.php"; 
 $srv = new SoapServer($wsdl);
 $srv->setClass("reg");
 $srv->handle();
?>