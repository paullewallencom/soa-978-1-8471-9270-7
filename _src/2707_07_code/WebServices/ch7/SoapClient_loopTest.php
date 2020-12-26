<?php 
 //File: SoapClient_loopPartner.php
 require_once "obj2Arr.php"; 
 $wsdl = "http://localhost:8081/active-bpel/services/loopProcessService?wsdl";
 $xmldoc = simplexml_load_file('purchaseOrder.xml');
 $xmlarr = obj2Arr($xmldoc);
 $client = new SoapClient($wsdl);
 try {
  print $result=$client->processOrder($xmlarr);
 }
 catch (SoapFault $exp) {
  print $exp->getMessage();
 }
?>
