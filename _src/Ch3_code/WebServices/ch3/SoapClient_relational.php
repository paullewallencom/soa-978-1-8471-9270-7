<?php 
 //File: SoapClient_relational.php
 require_once "obj2Arr.php"; 
 $wsdl = "http://localhost/WebServices/wsdl/po_relational.wsdl";
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
