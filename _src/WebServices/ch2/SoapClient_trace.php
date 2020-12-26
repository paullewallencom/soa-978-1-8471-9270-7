<?php 
 //File: SoapClient_trace.php
 require_once 'obj2Arr.php';
 $wsdl = "http://localhost/WebServices/wsdl/po_imp.wsdl";
 $xml = simplexml_load_file('purchaseOrder.xml');
 $arr = obj2Arr($xml);
 $client = new SoapClient($wsdl, array('trace' => 1));
 try {
  print "RESULT:\n".$result=$client->placeOrder($arr)."\n";
 }
 catch (SoapFault $exp) {
  print $exp->getMessage();
 }
 print "REQUEST:\n".htmlspecialchars($client->__getLastRequest())."\n"; 
 print "RESPONSE:\n" .htmlspecialchars($client->__getLastResponse())."\n";
?>
