<?php 
 //File: SoapClient_secure.php
 $wsdl = "http://localhost/WebServices/wsdl/po_secure.wsdl";
 $xmldoc = simplexml_load_file('purchaseOrder.xml');
 $pono = $xmldoc->pono;
 $shipName = $xmldoc->shipTo->name;    
 $mix=$pono.$shipName;     
 $hash=sha1($mix);
 $podoc=$xmldoc->asXML();
 $client = new SoapClient($wsdl);
 try {
  print $result=$client->placeOrder($hash, $podoc);
 }
 catch (SoapFault $exp) {
  print $exp->getMessage();
 }
?>
