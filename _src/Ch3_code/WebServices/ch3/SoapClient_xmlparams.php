<?php 
 //File: SoapClient_xmlparams.php
 require_once "obj2Arr.php"; 
 $wsdl = "http://localhost/WebServices/wsdl/po_xmlparams.wsdl";
 $client = new SoapClient($wsdl);
 $pono='108128476';
 $xmlpar = simplexml_load_file('params.xml');
 $xmlarr = obj2Arr($xmlpar);
 try {
  print $result=$client->getOrder($pono, $xmlarr);
 }
 catch (SoapFault $exp) {
  print $exp->getMessage();
 }
?>
