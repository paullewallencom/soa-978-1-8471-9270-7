<?php 
 //File: SoapClient_headers.php
 $wsdl = "http://localhost/WebServices/wsdl/po_headers.wsdl";
 $xmldoc = simplexml_load_file('purchaseOrder.xml');
 $pono = $xmldoc->pono;
 $hash=sha1($pono);
 $header = new SOAPHeader('http://localhost/WebServices/ch4/headers', 'hash', $hash);
 $client = new SoapClient($wsdl);
 $client->__setSOAPHeaders($header);
 $podoc=$xmldoc->asXML();
 try {
  print $result=$client->placeOrder($podoc);
 }
 catch (SoapFault $exp) {
  print $exp->getMessage();
 }
?>
