<?php 
 //File: SoapClient_schema.php
 require_once "obj2Arr.php"; 
 $wsdl = "http://localhost/WebServices/wsdl/po_schema.wsdl";
 $xmldoc = simplexml_load_file('purchaseOrder.xml');
 $xmlarr = obj2Arr($xmldoc);
 $client = new SoapClient($wsdl);
 try {
  print $result=$client->placeOrder($xmlarr);
 }
 catch (SoapFault $exp) {
  print $exp->getMessage();
 }
?>